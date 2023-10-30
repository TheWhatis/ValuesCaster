<?php
/**
 * Файл с классом для
 * преобразования значения
 * в массив
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
 * Преобразовать в массив
 *
 * PHP version 8
 *
 * @category Cast
 * @package  PhpCast
 * @author   Whatis <anton-gogo@mail.ru>
 * @license  unlicense
 * @link     https://github.com/TheWhatis/PhpCast
 */
class Arr extends BaseCast
{
    use Traits\NonArgumentsParse;

    /**
     * Получить название преобразования
     *
     * @return array $name Название преобразования
     */
    public static function getName(): array
    {
        return [ 'arr', 'array' ];
    }

    /**
     * Преобразовать в массив
     *
     * @param mixed $value Значение
     *
     * @return array
     */
    public function cast(mixed $value): array
    {
        return (array) $value;
    }
}
