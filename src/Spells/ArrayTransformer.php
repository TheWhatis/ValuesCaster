<?php
/**
 * Файл с преобразователем для
 * детализированного преобразования
 * массивов за счёт использования
 * других преобразователей
 *
 * PHP version 8
 *
 * @category Spells
 * @package  ValuesCaster
 * @author   Whatis <anton-gogo@mail.ru>
 * @license  unlicense
 * @link     https://github.com/TheWhatis/ValuesCaster
 */

namespace Whatis\ValuesCaster\Spells;

use Whatis\ValuesCaster\ISpell;
use Whatis\ValuesCaster\Attributes\ArrayTransformerContextual;
use Whatis\ValuesCaster\Context\ArrayTransformerContext as ATContext;

use Whatis\Support\Arr;
use ReflectionClass;
use ReflectionMethod;
use Generator;

/**
 * Преобразователь для
 * детализированного преобразования
 * массивов за счёт использования
 * других преобразователей
 *
 * PHP version 8
 *
 * @category Spells
 * @package  ValuesCaster
 * @author   Whatis <anton-gogo@mail.ru>
 * @license  unlicense
 * @link     https://github.com/TheWhatis/ValuesCaster
 */
class ArrayTransformer implements ISpell
{
    /**
     * Массив с ключами и правилами
     * преобразования
     *
     * @var array
     */
    protected array $spells = [];

    /**
     * Иницилизация класса
     *
     * @param array $arguments Список преобразователей
     */
    public function __construct(array $arguments = [])
    {
        $this->setAll($arguments);
    }

    /**
     * Установить новые преобразования
     *
     * @param array<string|int, ISpell> $spells Преобразователи
     *
     * @return void
     */
    public function setAll(array $spells): void
    {
        $this->spells = [];
        foreach ($spells as $key => $spell) {
            $this->set($key, $spell);
        }
    }

    /**
     * Добавить преобразователь
     *
     * @param string|int $key  Ключ в массиве
     * @param ISpell      $spell Преобразователь
     *
     * @return void
     */
    public function set(string|int $key, ISpell $spell): void
    {
        $this->spells[$key] = $spell;
    }

    /**
     * Получить список преобразователей
     *
     * @return array
     */
    public function getSpells(): array
    {
        return $this->spells;
    }

    /**
     * Получить пропущенные ключи в данных
     *
     * @param array      $array Массив
     * @param string|int $key   Ключ
     *
     * @return Generator
     */
    protected function missedKeys(
        array $array, string|int $key
    ): Generator {
        // Разделяем ключ на сегменты
        $segments = explode('.', $key);

        // Выковыриваем последний
        // сегмент из ключа
        $lastSegment = array_pop($segments);

        // Провряем чтобы постановочные
        // знаки не находились в конце
        // dotted пути (такие нельзя установить)
        // Если не найдены, то
        // начинаем преобразования
        if (!array_key_exists($lastSegment, Arr::$wildcards)) {
            foreach ($segments as $segment) {
                if (array_key_exists($segment, Arr::$wildcards)) {
                    $values = Arr::getWithWildcards(
                        $array, implode('.', $segments)
                    );
                    foreach ($values as $key => $value) {
                        if (is_array($value)
                            && Arr::exists($lastSegment, $value)
                        ) {
                            yield $key . '.' . $lastSegment;
                        }
                    }
                    return;
                }
            }

            // Если был передан "чистый" ключ
            // то его и возвращаем
            if (!Arr::dotExists($key, $array)) {
                yield $key;
            }
        }
    }

    /**
     * Запустить один единственный преобразователь
     *
     * @param array      $array   Общие данные
     * @param mixed      $value   Текущее значение
     * @param string|int $key     Текущий ключ
     * @param ISpell     $spell   Преобразователь
     * @param ATContext  $context Вспомогательный объект преобраз-ля
     *
     * @return array Преобразованный массив
     */
    protected function castUnit(
        array $array,
        mixed $value,
        string|int $key,
        ISpell $spell,
        ATContext $context
    ): array {
        $class = new ReflectionClass($spell);
        $method = new ReflectionMethod($spell, 'cast');
        $parameterNames = array_map(
            static function ($attribute) {
                $instance = $attribute->newInstance();
                return $instance->getName();
            }, array_unique(
                array_merge(
                    $class->getAttributes(
                        ArrayTransformerContextual::class
                    ),
                    $method->getAttributes(
                        ArrayTransformerContextual::class
                    )
                )
            )
        );

        // Если преобразователь имеет
        // возможность принять объект ArrayTransformerContext
        if ($parameterNames) {
            $converted = $spell->cast(
                ...array_merge(
                    [$value], array_combine(
                        $parameterNames, array_map(
                            static function () use ($context) {
                                return $context;
                            }, $parameterNames
                        )
                    )
                )
            );

            if (!$context->shouldSkip()) {
                $array = $context->getArray() ?? $array;
                $key = $context->getKey();
                Arr::set($array, $key, $converted);
            }

            return $array;
        }

        // Если это обычный преобразователь, то
        // пропускаем его
        if ($context->isMissed() && !$parameterNames) {
            return $array;
        }

        // Иначе по-стандарту применяем преобразования
        // и сразу присваиваем значение
        Arr::set($array, $key, $spell->cast($value));

        return $array;
    }

    /**
     * Выполнить преобразования массива
     *
     * @param mixed $value Значение (работаем только с массивами)
     *
     * @return mixed
     */
    public function cast(mixed $value): mixed
    {
        if (is_array($value)) {
            // Перебираем преобразователи
            foreach ($this->spells as $key => $spell) {
                // Перебираем значения, которые не были
                // пераданы, но были определены по шаблону
                foreach ($this->missedKeys($value, $key) as $key) {
                    if (!Arr::exists($key, $value)) {
                        $context = new ATContext(
                            $this, $value, $key, true
                        );

                        $value = $this->castUnit(
                            $value, null, $key, $spell, $context
                        );
                    }
                }

                // Перебираем переданные значения
                $values = Arr::getWithWildcards($value, $key);
                foreach ($values as $key => $val) {
                    if (Arr::exists($key, $value)) {
                        $context = new ATContext(
                            $this, $value, $key, false
                        );

                        $value = $this->castUnit(
                            $value, $val, $key, $spell, $context
                        );
                    }
                }
            }
        }

        return $value;
    }
}
