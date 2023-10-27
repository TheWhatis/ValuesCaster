<?php
/**
 * Файл с трейтом реализующим статичный
 * метод `isMissed` в true,
 * обозначая, что возможны
 * передачи значений, которые
 * были пропущены
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
 * Трейт реализующий статичный
 * метод `isMissed` в true,
 * обозначая, что возможны
 * передачи значений, которые
 * были пропущены
 *
 * PHP version 8
 *
 * @category Traits
 * @package  PhpCast
 * @author   Whatis <anton-gogo@mail.ru>
 * @license  unlicense
 * @link     https://github.com/TheWhatis/PhpCast
 */
trait IsMissed
{
    /**
     * Отправлять ли значения, которые
     * была пропущены - не переданы
     * в массиве
     *
     * @return bool
     */
    public static function isMissed(): bool
    {
        return true;
    }
}
