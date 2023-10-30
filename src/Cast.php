<?php
/**
 * Файл с основным класс для работы
 * с преобразователями
 *
 * PHP version 8
 *
 * @category Cast
 * @package  PhpCast
 * @author   Whatis <anton-gogo@mail.ru>
 * @license  unlicense
 * @link     https://github.com/TheWhatis/PhpCast
 */

namespace Whatis\PhpCast;

use Whatis\Support\Arr;

use ReflectionClass;
use InvalidArgumentException;

/**
 * Основной класс для работы
 * с преобразователями
 *
 * PHP version 8
 *
 * @category Cast
 * @package  PhpCast
 * @author   Whatis <anton-gogo@mail.ru>
 * @license  unlicense
 * @link     https://github.com/TheWhatis/PhpCast
 */
class Cast
{
    /**
     * Массив с ключами и правилами
     * преобразования
     *
     * @var array
     */
    public array $casts;

    /**
     * Объявленные преобразователи
     *
     * @var array
     */
    public static array $declared = [];

    /**
     * Объявленные преобразователи
     *
     * @var array
     */
    public array $declaredCasts = [];

    /**
     * Иницилизация класса
     *
     * @param array $casts Правила преобразования
     */
    public function __construct(array $casts)
    {
        $this->setCasts($casts);
    }

    /**
     * Добавить новый объявленный
     * преобразователь
     *
     * Они обязательно должны быть
     * наследуемые от интерфейса {@see ICast}
     * и любого из этих: {@see \Whatis\PhpCast\Standart},
     * {@see \Whatis\PhpCast\IsMissed},
     * {@see \Whatis\PhpCast\OnlyMissed}
     *
     * @param string $cast Класс преобразователя
     *
     * @return void
     * @throw InvalidArgumentException
     */
    public static function add(string $cast): void
    {
        if (is_a($cast, ICast::class, true)) {
            if (static::isCasted($cast)) {
                if (!in_array($cast, static::$declared)) {
                    static::$declared[] = $cast;
                    return;
                }
                throw new InvalidArgumentException(
                    'Cast \' ' . $cast . '\' already exists in declared'
                );
            }
            throw new InvalidArgumentException(
                'ICast object has been also implements from Whatis\PhpCast\Standart or Whatis\PhpCast\IsMissed or Whatis\PhpCast\OnlyMissed'
            );
        }
        throw new InvalidArgumentException(
            'Cast must be implements Whatis\PhpCast\ICast'
        );
    }

    /**
     * Самому иницилизировать объект
     * и передать в него объявленные
     * преобразователи
     *
     * Если это сделать, то теперь, при
     * каждом вызове метод cast преобразователи
     * не будут обновляться сами. Добавить
     * новый преобразователь можно
     * будет только методом {@see Cast::add()}
     *
     * @param array<int, string> $casts Преобразователи
     *
     * @return void
     */
    public static function init(array $casts): void
    {
        foreach ($casts as $cast) {
            static::add($cast);
        }
    }

    /**
     * Получить все объявленные
     * преобразователи
     *
     * @return array
     */
    public static function getDeclaredCasts(): array
    {
        return static::$declared
            ? static::$declared
            : array_filter(
                get_declared_classes(), function ($class) {
                    $reflection = new ReflectionClass($class);
                    return is_a($class, ICast::class, true)
                        && !$reflection->isAbstract()
                        && !$reflection->isInterface()
                        && !$reflection->isTrait()
                        && static::isCasted($class);
            }
        );
    }

    /**
     * Проверить что переданный
     * преобразователь стандартный
     *
     * @param object|string $cast Преобразователь
     *
     * @return bool
     */
    public static function isStandart(object|string $cast): bool
    {
        return is_a($cast, Standart::class, true);
    }

    /**
     * Проверить что переданный
     * преобразователь принимает
     * пропущенные значения
     *
     * @param object|string $cast Преобразователь
     *
     * @return bool
     */
    public static function isMissed(object|string $cast): bool
    {
        return is_a($cast, IsMissed::class, true)
            || static::isOnlyMissed($cast);
    }

    /**
     * Проверить что переданный
     * преобразователь принимает
     * только пропущенные значения
     *
     * @param object|string $cast Преобразователь
     *
     * @return bool
     */
    public static function isOnlyMissed(object|string $cast): bool
    {
        return is_a($cast, OnlyMissed::class, true);
    }

    /**
     * Проверить что переданный
     * преобразователь принимает
     * ссылку на данные
     *
     * @param object|string $cast Преобразователь
     *
     * @return bool
     */
    public static function isDataReference(object|string $cast): bool
    {
        return is_a($cast, WithDataReference::class, true);
    }

    /**
     * Проверить что преобразователь
     * имеет метод для преобразования
     * значений
     *
     * @param object|string $cast Преобразователь
     *
     * @return bool
     */
    public static function isCasted(object|string $cast): bool
    {
        return static::isStandart($cast)
            || static::isMissed($cast);
    }

    /**
     * Установить новые преобразования
     *
     * @param array $casts Правила преобразования
     *
     * @return void
     */
    public function setCasts(array $casts): void
    {
        $this->casts = Arr::dot($casts);
    }

    /**
     * Применить отдельное преобразование
     *
     * @param array      $data Ссылка на данные
     * @param string|int $key  Ключ значения
     * @param ICast      $cast Преобразователь
     *
     * @return void
     * @throw InvalidArgumentException
     */
    protected function castUnit(
        array &$data, string|int $key, ICast $cast
    ): void {
        if (!static::isCasted($cast)) {
            throw new InvalidArgumentException(
                'ICast object has been also implements from Whatis\PhpCast\Standart or Whatis\PhpCast\IsMissed or Whatis\PhpCast\OnlyMissed'
            );
        }

        // Если можно, то устанавливаем
        // ссылку на данные преобразователю
        if (static::isDataReference($cast)) {
            $cast->setDataReference($data);
        }

        // Если преобразователь принимает
        // только не значения, которые
        // были пропущены
        if (!static::isMissed($cast)) {
            // Если значение под ключём существует
            foreach (
                // Получаем все существующие
                // значения и ключи к ним
                // с использованием
                // постановочных знаков
                Arr::getWithWildcards(
                    $data, $key
                ) as $key => $value
            ) {
                Arr::set($data, $key, $cast->cast($value));
            }
        }

        // Если допустима передача значений,
        // которые не существуют в массиве
        if (static::isMissed($cast)) {
            // Разделяем ключ на
            // сегменты
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
                // Если в ключе были переданы шаблоны,
                // то используя их, передаем
                // значения в преобразователь
                foreach ($segments as $segment) {
                    if (array_key_exists(
                        $segment,
                        Arr::$wildcards
                    )
                    ) {
                        foreach (
                            // Получаем все существующие
                            // значения и ключи к ним
                            // с использованием
                            // постановочных знаков
                            Arr::getWithWildcards(
                                $data,
                                implode('.', $segments)
                            ) as $key => $value
                        ) {
                            // Исключаем элементы, которые
                            // не нужно перезаписывать
                            if (is_array($value)) {
                                Arr::set(
                                    $data,
                                    "$key.$lastSegment",
                                    $cast->cast(null, true)
                                );
                            }
                        }

                        // И сразу выходим из функции
                        // чтобы не была выполнена
                        // следующая конструкция
                        return;
                    }
                }

                // Если был передан "чистый" ключ
                // то просто его и передаем
                // в преобразователь
                Arr::set($data, $key, $cast->cast(null, true));
            }
        }
    }

    /**
     * Найти преобразователь
     * по названию
     *
     * @param string $name Название преобразователя
     *
     * @return string Класс преобразователя
     * @throw InvalidArgumentException
     */
    protected function searchCast(string $name): string
    {
        // Перебираем объявленные
        // преобразователи
        foreach ($this->declaredCasts as $cast) {
            // Если преобразователь найден, то
            // возвращаем его
            if ($cast::getName() === $name) {
                return $class;
            }
        }

        // Возвращаем исключение, если
        // преобразователь не найден
        throw new InvalidArgumentException(
            "Found not cast with name '$cast'"
        );
    }

    /**
     * Разобрать аргументы из строки
     *
     * @param string $arguments Аргументы
     *
     * @return array
     */
    protected function parseStringArguments(string $arguments): array
    {
        $parsed = [];
        foreach (explode(',', $arguments) as $argument) {
            if (str_contains('::', $argument)) {
                $exp = explode('::', $argument);
                $parsed[$exp[0]] = $exp[1] ?? null;
                continue;
            }
            $parsed[] = $argument;
        }
        return $result;
    }

    /**
     * Обработать переданный преобразователь
     *
     * @param string|array $cast
     *
     * @return array
     * @throw InvalidArgumentException
     */
    protected function parseCast(string|array $cast): ICast
    {
        if (is_string($cast)) {
            $cast = $this->searchCast(
                ($exp = explode(':', $cast, 1))[0]
            );

            return new $cast(
                $exp[1] ? $this->parseStringArguments($exp[1]) : []
            );
        }

        // Если передан массив

        // Аргументы могут находиться либо
        // под ключем 'arguments', либо под
        // индексом '1'
        $arguments = $cast['arguments'] ?? $cast[1] ?? [];

        // Преобразователь может находиться либо
        // под ключем 'cast', либо под
        // индексом '0'
        $cast = $cast['cast'] ?? $cast[0] ?? null;

        // Если преобразователь
        // был передан
        if ($cast) {
            // Готовый объект сразу
            // возвращаем
            if ($cast instanceof ICast) {
                return $cast;
            }

            // Иначе ищем по имени и создаем
            // новый с переданными аргументами
            $cast = $this->searchCast($cast);
            return new $cast(
                is_array($arguments) ? $arguments
                    : $this->parseStringArguments($arguments)
            );
        }

        // Если преобразователь не был передан
        // то выкидываем исключение
        throw new InvalidArgumentException(
            implode(
                "\n", [
                    'Cast not passed, example passed:',
                    '',
                    '// OOP',
                    '$cast = new Cast([',
                    '    \'path.to.key\' => new Casts\Integer([',
                    '        \'key\' => \'value\' // Arguments',
                    '    ])',
                    ']);',
                    '',
                    '// String',
                    '$cast = new Cast([',
                    '    \'path.to.key\' => \'castname:key::value,key2::value\'',
                    ']);',
                    '',
                    '// Array',
                    '$cast = new Cast([',
                    '    \'path.to.key\' => [',
                    '        \'cast\' => \'castname\'',
                    '        \'arguments\' => [ // Arguments',
                    '            \'key\' => \'value\'',
                    '        ]',
                    '    ])',
                    ']);',
                    '$cast = new Cast([',
                    '    \'path.to.key\' => [',
                    '        \'cast\' => new Casts\Integer([',
                    '            \'key\' => \'value\' // Arguments',
                    '        ])',
                    '    ])',
                    ']);',
                    ''
                ]
            )
        );
    }

    /**
     * Выполнить преобразования
     *
     * @param array $data Данные
     *
     * @return array
     * @throw InvalidArgumentException
     */
    public function cast(array $data): array
    {
        // Обновляем список объявленных
        // преобразователей
        $this->declaredCasts = static::getDeclaredCasts();

        // Перебираем преобразователи
        foreach ($this->casts as $key => $cast) {
            // Готовый объект сразу вызываем
            if ($cast instanceof ICast) {
                $this->castUnit($data, $key, $cast);
                continue;
            }

            // Другие доступные форматы разбираем
            // и тоже вызываем преобразователь
            if (is_array($cast) || is_string($cast)) {
                $this->castUnit(
                    $data, $key, $this->parseCast($cast)
                );
                continue;
            }

            // Если передан неверный формат
            // преобразователя, выкидываем
            // исключение
            throw new InvalidArgumentException(
                'Invalid passed cast type, must be \'string\', \'array\' or \'ICast\' object, passed: \'' . gettype($cast) . '\''
            );
        }

        return $data;
    }
}
