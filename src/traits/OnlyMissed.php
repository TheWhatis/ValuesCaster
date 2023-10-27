<?php
/**
 * Файл с трейтом, который реализовывает
 * статичные методы для
 * преобразователей, которые
 * обозначают что в него
 * необходимо передавать
 * исключительно пропущенные
 * значения
 *
 * PHP version 8
 *
 * @category Traits
 * @package  PhpCast
 * @author   Whatis <anton-gogo@mail.ru>
 * @license  unlicense
 * @link     https://github.com/TheWhatis/PhpCast
 */

namespace Whatis\PhpCast\Traits;

/**
 * Трейт, который реализовывает
 * статичные методы для
 * преобразователей, которые
 * обозначают что в него
 * необходимо передавать
 * исключительно пропущенные
 * значения
 *
 * PHP version 8
 *
 * @category Traits
 * @package  PhpCast
 * @author   Whatis <anton-gogo@mail.ru>
 * @license  unlicense
 * @link     https://github.com/TheWhatis/PhpCast
 */
trait OnlyMissed
{
    use IsMissed;

    /**
     * Отправлять ли исключительно значения,
     * которые были пропущены
     *
     * @return bool
     */
    public static function onlyMissed(): bool
    {
        return true;
    }
}
