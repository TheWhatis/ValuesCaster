<?php
/**
 * Файл с классом для
 * преобразования значения
 * в int
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
 * Преобразовать в int
 *
 * PHP version 8
 *
 * @category Cast
 * @package  PhpCast
 * @author   Whatis <anton-gogo@mail.ru>
 * @license  unlicense
 * @link     https://github.com/TheWhatis/PhpCast
 */
class Integer extends BaseCast
{
    /**
     * Получить название преобразования
     *
     * @return array $name Название преобразования
     */
    public static function getName(): array
    {
        return [ 'int', 'integer' ];
    }

    /**
     * Преобразовать в int
     *
     * @param mixed $value Значение
     *
     * @return int
     */
    public function cast(mixed $value = null): int
    {
        return (int) $value;
    }
}
