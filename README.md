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
    '[string].entryarray => new Casts\Integer(['this arguments'])
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

Также вы можете создавать свои преобразователи:
```php
///
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
class MyCast extends BaseCast
{
    use Traits\NonMissed;
    use Traits\NonArgumentsParse;

    /**
     * Получить название преобразования
     *
     * @return string $name Название преобразования
     */
    public static function getName(): string
    {
        return 'castname';
    }

    /**
     * Преобразование
     *
     * @param mixed $value Значение
     * @param bool  $miss  Передано ли пропущенное значение
     *
     * @return string
     */
    public function cast(mixed $value, bool $miss = false): string
    {
        return 'newvalue';
    }
}
```
