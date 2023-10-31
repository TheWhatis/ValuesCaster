<?php
/**
 * Файл с классом для
 * преобразования значения
 * в bool
 *
 * PHP version 8
 *
 * @category Cast
 * @package  PhpCast
 * @author   Whatis <anton-gogo@mail.ru>
 * @license  unlicense
 * @link     https://github.com/TheWhatis/PhpCast
 */

namespace Whatis\PhpCast\Casts;

use Whatis\PhpCast\BaseCast;

/**
 * Преобразовать в bool
 *
 * PHP version 8
 *
 * @category Cast
 * @package  PhpCast
 * @author   Whatis <anton-gogo@mail.ru>
 * @license  unlicense
 * @link     https://github.com/TheWhatis/PhpCast
 */
class Boolean extends BaseCast
{
    /**
     * Получить название преобразования
     *
     * @return array $name Название преобразования
     */
    public static function getName(): array
    {
        return [ 'bool', 'boolean' ];
    }

    /**
     * Преобразовать в bool
     *
     * @param mixed $value Значение
     *
     * @return bool
     */
    public function cast(mixed $value): bool
    {
        return (bool) $value;
    }
}
