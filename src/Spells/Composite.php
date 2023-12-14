<?php
/**
 * Файл с классом для
 * преобразования значения
 * в int
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
use Whatis\ValuesCaster\Context\CompositeContext;
use Whatis\ValuesCaster\Attributes\CompositeContextual;

use ReflectionClass;
use ReflectionMethod;
use InvalidArgumentException;

/**
 * Компановщик для преобразователей
 *
 * PHP version 8
 *
 * @category Spells
 * @package  ValuesCaster
 * @author   Whatis <anton-gogo@mail.ru>
 * @license  unlicense
 * @link     https://github.com/TheWhatis/ValuesCaster
 */
class Composite implements ISpell
{
    /**
     * Преобразователи
     *
     * @var array<int, ISpell>
     */
    protected array $spells;

    /**
     * Иницилизация преобразователя
     *
     * @param array<int, ISpell> ...$spells Преобразователи
     */
    public function __construct(...$spells)
    {
        $this->setAll(...$spells);
    }

    /**
     * Установить преобразователи
     *
     * @param array<int, ISpell> ...$spells Преобразователи
     *
     * @return void
     */
    public function setAll(...$spells): void
    {
        $this->spells = [];
        foreach ($spells as $spell) {
            $this->add($spell);
        }
    }

    /**
     * Установить преобразователь
     *
     * @param int    $index Индекс элемента
     * @param ISpell $spell Преобразователь
     *
     * @return void
     */
    public function set(int $index, ISpell $spell): void
    {
        $this->spells[$index] = $spell;
    }

    /**
     * Удалить преобразователь
     *
     * @param int $index Индекс элемента
     *
     * @return void
     */
    public function unset(int $index): void
    {
        unset($this->spells[$index]);
    }

    /**
     * Добавить новый преобразователь
     *
     * @param ISpell $spell Преобразователь
     *
     * @return void
     */
    public function add(ISpell $spell): void
    {
        $this->spells[] = $spell;
    }

    /**
     * Получить переданные преобразователи
     *
     * @return array<int, ISpell>
     */
    public function getSpells(): array
    {
        return $this->spells;
    }

    /**
     * Получить массив с аргументами
     * для поддерживаемого преобразователя
     *
     * @param ISpell           $spell   Преобразователь
     * @param CompositeContext $context Контекст
     *
     * @return array
     */
    public static function getSupportsArguments(
        ISpell $spell, CompositeContext $context
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
                        CompositeContextual::class
                    ),
                    $method->getAttributes(
                        CompositeContextual::class
                    )
                )
            )
        );

        return array_combine(
            $parameterNames, array_map(
                static function () use ($context) {
                    return $context;
                }, $parameterNames
            )
        );
    }

    /**
     * Преобразовываем значения по-цепочке
     *
     * @param mixed $value Значение
     *
     * @return mixed
     */
    public function cast(mixed $value): mixed
    {
        $original = $value;
        foreach ($this->spells as $spell) {
            $context = new CompositeContext($this);
            $converted = $spell->cast(
                ...array_merge(
                    [$value], static::getSupportsArguments(
                        $spell, $context
                    )
                )
            );

            if ($context->shouldBreak()) {
                break;
            }

            if ($context->shouldCancel()) {
                break;
            }

            if ($context->shouldSkip()) {
                continue;
            }

            $value = $converted;
        }

        return $context->shouldCancel() ? $original : $value;
    }
}
