<?php
/**
 * Файл с классом для
 * преобразования значения
 * в object
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
 * Преобразовать в object
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
    use Traits\NonArgumentsParse;

    /**
     * Получить название преобразования
     *
     * @return array $name Название преобразования
     */
    public static function getName(): array
    {
        return [ 'obj', 'object' ];
    }

    /**
     * Преобразовать в object
     *
     * @param mixed $value Значение
     *
     * @return object
     */
    public function cast(mixed $value): object
    {
        return (object) $value;
    }
}
