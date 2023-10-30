# Библиотека для создания своих правил преобразования php
## Документация
  * [Documentation](https://github.com/TheWhatis/PhpCast/tree/master/docs/markdown/index.md "Documentation")
## Установка
```
composer require whatis/php-cast
```
## Использование
```php
<?php
/// ... Подключение пакета (require_once 'vendor/autoload.php')

// Подключаем основной класс
// для использования
// преобразований
use Whatis\PhpCast\Cast;

// Подключаем namespace
// в котором находятся
// стандартные классы
// преобразований
use Whatis\PhpCast\Casts;

// Для оптимизации вы можете
// сами установить доступные
// преобразователи (иницилизировать)
// в основной класс
// Cast::init(
//     [
//         Casts\Integer::class,
//         Casts\Str::class,
//         Casts\ByDefault::class
//         // ...
//     ]
// );

$array = [
    'key' => 'value',
    'array' => [
        'key' => 'value',
        'entryarray' => [
            'key' => 'value'
        ],
        1 => 'value'
    ],
    1 => 'value',
    2 => 'value',
    3 => [
        'key' => 'value'
    ]
];

// Устанавливаем правила преобразований
// с помощью ООП
$cast = new Cast([
    'array.key' => new Casts\Integer(),
    '[string].entryarray' => new Casts\Integer(['this arguments'])
]);
var_dump($cast->cast());
// > [
// >     'key' => 'value',
// >     'array' => [
// >         'key' => 0, // Преобразовано
// >         'entryarray' => 1, // Преобразовано
// >         1 => 'value'
// >     ],
// >     1 => 'value',
// >     2 => 'value'
// >     3 => [
// >         'key' => 'value'
// >     ]
// > ]

// Устанавливаем правила преобразования
// с помощью их названий
$cast = new Cast([
    '[int]' => 'int',
    '[int].key' => 'int',
    'array.new' => 'default:value::myvalue'
]);
var_dump($cast->cast());
// > [
// >     'key' => 'value',
// >     'array' => [
// >         'key' => 'value',
// >         'entryarray' => [
// >             'key' => 'value'
// >         ],
// >         'new' => 'myvalue', // Преобразовано
// >         1 => 'value'
// >     ],
// >     1 => 0, // Преобразовано
// >     2 => 0, // Преобразовано
// >     3 => [
// >         'key' => 0 // Преобразовано
// >     ]
// > ];
```

### Также вы можете создавать свои преобразователи:
```php
<?php
... Подключение пакета (require_once 'vendor/autoload.php')

/**
 * Пример преобразователя
 *
 * PHP version 8
 *
 * @category Example
 * @package  ExamplePackage
 * @author   Whatis <anton-gogo@mail.ru>
 * @license  unlicense
 * @link     https://github.com/TheWhatis/PhpCast
 */

namespace Whatis\PhpCast\Casts;

use Whatis\PhpCast\BaseCast;
use Whatis\PhpCast\Traits;

/**
 * Пример преобразователя
 *
 * PHP version 8
 *
 * @category Example
 * @package  ExamplePackage
 * @author   Whatis <anton-gogo@mail.ru>
 * @license  unlicense
 * @link     https://github.com/TheWhatis/PhpCast
 */
class ExampleCast extends BaseCast
{
    use Traits\NonArgumentsParse;

    /**
     * Получить название преобразования
     *
     * @return string $name Название преобразования
     */
    public static function getName(): string
    {
        return 'example_castname';
    }

    /**
     * Преобразование
     *
     * @param mixed $value Значение
     *
     * @return string
     */
    public function cast(mixed $value): string
    {
        return 'newvalue';
    }
}
```
#### Преобразователь с возможность получить ссылку на основные данные
```php
<?php
... Подключение пакета (require_once 'vendor/autoload.php')

/**
 * Пример преобразователя
 *
 * PHP version 8
 *
 * @category Example
 * @package  ExamplePackage
 * @author   Whatis <anton-gogo@mail.ru>
 * @license  unlicense
 * @link     https://github.com/TheWhatis/PhpCast
 */

namespace Whatis\PhpCast\Casts;

use Whatis\PhpCast\BaseCast;

use Whatis\PhpCast\WithDataReference;

use Whatis\PhpCast\Traits;

/**
 * Пример преобразователя
 *
 * PHP version 8
 *
 * @category Example
 * @package  ExamplePackage
 * @author   Whatis <anton-gogo@mail.ru>
 * @license  unlicense
 * @link     https://github.com/TheWhatis/PhpCast
 */
class WithDataReferenceExampleCast extends BaseCast implements WithDataReference
{
    use Traits\NonArgumentsParse;

    /**
     * Ссылка на данные
     *
     * @var ?array
     */
     public ?array $data = null;

    /**
     * Получить название преобразования
     *
     * @return string $name Название преобразования
     */
    public static function getName(): string
    {
        return 'with_data_reference_example_castname';
    }

    /**
     * Установить ссылку на данные, которые
     * были переданы в Cast
     *
     * @param array $data Данные
     *
     * @return void
     */
    public function setDataReference(array &$data): void
    {
        $this->data = &$data;
    }

    /**
     * Преобразование
     *
     * @param mixed $value Значение
     *
     * @return string
     */
    public function cast(mixed $value): string
    {
        return 'newvalue';
    }
}
```
#### Преобразователь с помощью которого есть возможность получить пропущенные значения (пропущенные данные - которые не были переданы)
```php
<?php
... Подключение пакета (require_once 'vendor/autoload.php')

/**
 * Пример преобразователя
 *
 * PHP version 8
 *
 * @category Example
 * @package  ExamplePackage
 * @author   Whatis <anton-gogo@mail.ru>
 * @license  unlicense
 * @link     https://github.com/TheWhatis/PhpCast
 */

namespace Whatis\PhpCast\Casts;

use Whatis\PhpCast\ICast;
use Whatis\PhpCast\IsMissed;

use Whatis\PhpCast\WithDataReference;

use Whatis\PhpCast\Traits;

/**
 * Пример преобразователя
 *
 * PHP version 8
 *
 * @category Example
 * @package  ExamplePackage
 * @author   Whatis <anton-gogo@mail.ru>
 * @license  unlicense
 * @link     https://github.com/TheWhatis/PhpCast
 */
class MissedExampleCast implements ICast, IsMissed
{
    use Traits\NonArgumentsParse;

    /**
     * Получить название преобразования
     *
     * @return string $name Название преобразования
     */
    public static function getName(): string
    {
        return 'missed_example_castname';
    }

    /**
     * Преобразование
     *
     * @param mixed $value Значение
     * @param bool  $miss  Пропуещно ли значение
     *
     * @return string
     */
    public function cast(mixed $value, bool $miss = false): string
    {
        return 'newvalue';
    }
}
```
#### Преобразователь, который будет получать исключительно пропущенные значения
```php
<?php
... Подключение пакета (require_once 'vendor/autoload.php')

/**
 * Пример преобразователя
 *
 * PHP version 8
 *
 * @category Example
 * @package  ExamplePackage
 * @author   Whatis <anton-gogo@mail.ru>
 * @license  unlicense
 * @link     https://github.com/TheWhatis/PhpCast
 */

namespace Whatis\PhpCast\Casts;

use Whatis\PhpCast\ICast;
use Whatis\PhpCast\OnlyMissed;

use Whatis\PhpCast\WithDataReference;

use Whatis\PhpCast\Traits;

/**
 * Пример преобразователя
 *
 * PHP version 8
 *
 * @category Example
 * @package  ExamplePackage
 * @author   Whatis <anton-gogo@mail.ru>
 * @license  unlicense
 * @link     https://github.com/TheWhatis/PhpCast
 */
class OnlyMissedExampleCast implements ICast, OnlyMissed
{
    use Traits\NonArgumentsParse;

    /**
     * Получить название преобразования
     *
     * @return string $name Название преобразования
     */
    public static function getName(): string
    {
        return 'only_missed_example_castname';
    }

    /**
     * Преобразование
     *
     * @return string
     */
    public function cast(): string
    {
        return 'newvalue';
    }
}
```
