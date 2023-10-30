<?php
/**
 * Файл с классом для
 * преобразования значения
 * в строку
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
use Whatis\PhpCast\Traits;

/**
 * Преобразовать в строку
 *
 * PHP version 8
 *
 * @category Cast
 * @package  PhpCast
 * @author   Whatis <anton-gogo@mail.ru>
 * @license  unlicense
 * @link     https://github.com/TheWhatis/PhpCast
 */
class Str extends BaseCast
{
    use Traits\NonArgumentsParse;

    /**
     * Получить название преобразования
     *
     * @return array $name Название преобразования
     */
    public static function getName(): array
    {
        return [ 'str', 'string' ];
    }

    /**
     * Преобразовать в строку
     *
     * @param mixed $value Значение
     *
     * @return string
     */
    public function cast(mixed $value): string
    {
        return (string) $value;
    }
}
