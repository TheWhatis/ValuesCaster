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

use Generator;
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
     * @var ?array
     */
    public static ?array $declared = null;

    /**
     * Объявленные преобразователи
     *
     * @var array
     */
    public array $declaredCasts;

    /**
     * Иницилизация класса
     *
     * @param array $casts Правила преобразования
     */
    public function __construct(array $casts = [])
    {
        $this->setCasts($casts);

        // Получаем список объявленных
        // преобразователей
        $this->declaredCasts = static::$declared ?? array_filter(
            get_declared_classes(), function ($class) {
                $reflection = new ReflectionClass($class);
                return is_a($class, ICast::class, true)
                    && !$reflection->isAbstract()
                    && !$reflection->isInterface()
                    && !$reflection->isTrait();
            }
        );
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
     * Добавить новый объявленный
     * преобразователь
     *
     * @param string $cast Класс преобразователя
     *
     * @return void
     * @throw  InvalidArgumentException
     */
    public static function add(string $cast): void
    {
        static::$declared = static::$declared ?? [];
        if (is_a($cast, ICast::class, true)) {
            static::$declared[] = $cast;
            return;
        }

        // Если передан неверный формат
        // преобразователя, выкидываем
        // исключение
        throw new InvalidArgumentException(
            'Cast object must be implements from '
                . '\'Whatis\PhpCast\ICast\', passed \''
                . $cast . '\''
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
        static::$declared = [];
        foreach ($casts as $cast) {
            static::add($cast);
        }
    }

    /**
     * Получить пропущенные ключи в данных
     *
     * Смотреть {@see Attributes\OnlyMissed} и
     * {@see Attributes\WithMissed}
     *
     * @param array      $data Данные
     * @param string|int $key  Ключ
     *
     * @return Generator
     */
    protected function missedKeys(
        array $data, string|int $key
    ): Generator {
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
                if (array_key_exists($segment, Arr::$wildcards)) {
                    foreach (
                        // Получаем все существующие
                        // значения и ключи к ним
                        // с использованием
                        // постановочных знаков
                        Arr::getWithWildcards(
                            $data, implode('.', $segments)
                        ) as $key => $value
                    ) {
                        // Исключаем элементы, которые
                        // не нужно перезаписывать
                        !is_array($value) || Arr::exists(
                            $lastSegment, $value
                        ) ?: yield "$key.$lastSegment";
                    }
                    return;
                }
            }

            // Если был передан "чистый" ключ
            // то просто его и передаем
            // в преобразователь
            Arr::dotExists($key, $data) ?: yield $key;
        }
    }

    /**
     * Применить отдельное преобразование
     *
     * @param array      $data Ссылка на данные
     * @param string|int $key  Ключ значения
     * @param ICast      $cast Преобразователь
     *
     * @return void
     */
    protected function castUnit(
        array &$data,
        string|int $key,
        ICast $cast
    ): void {
        // Если преобразователь принимает
        // в себя данные по ссылке
        if ($cast instanceof WithDataReference) {
            $cast->setDataReference($data);
        }

        // Получаем Reflection метод для
        // последующиего получения
        // необходимых атрибутов
        $class = new ReflectionClass($cast);

        // Передавать ли исключительно
        // пропущенные значения
        $onlyMissed = $class->getAttributes(
            Attributes\OnlyMissed::class
        );

        // Если преобразователь принимает
        // только не значения, которые
        // были пропущены
        if (!$onlyMissed) {
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
                Arr::set($data, $key, $cast->cast($value, false));
            }
        }

        // Если допустима передача значений,
        // которые не существуют в массиве
        if ($onlyMissed || $class->getAttributes(
            Attributes\WithMissed::class
        )
        ) {
            foreach ($this->missedKeys($data, $key) as $key) {
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
     * @throw  InvalidArgumentException
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
     * @param string|array $cast Данные преобразователя
     *
     * @return array
     * @throw  InvalidArgumentException
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

        /* Если передан массив */

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
     * @throw  InvalidArgumentException
     */
    public function cast(array $data): array
    {
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
                'Invalid passed cast type, must be '
                    .'\'string\', \'array\' or \'ICast\' '
                    . 'object, passed: \''
                    . gettype($cast) . '\''
            );
        }

        return $data;
    }
}
