<?php
/**
 * Файл с интерфейсом, дополняющий
 * преобразование, для того, чтобы
 * возможно было изменить ключ
 * значения в передаваемом массиве
 * (либо установить, как угодно)
 *
 * Переданные данные в {@see Cast::cast}
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

/**
 * Файл с интерфейсом, дополняющий
 * преобразование, для того, чтобы
 * возможно было изменить ключ
 * значения в передаваемом массиве
 * (либо установить, как угодно)
 *
 * Переданные данные в {@see Cast}
 *
 * PHP version 8
 *
 * @category Cast
 * @package  PhpCast
 * @author   Whatis <anton-gogo@mail.ru>
 * @license  unlicense
 * @link     https://github.com/TheWhatis/PhpCast
 */
interface KeyChange
{
    /**
     * Получить и, возможно,
     * изменить ключ значения
     *
     * {@see Cast::cast}
     *
     * @param string|int $key Ключ
     *
     * @return string|int
     */
    public function keyChange(string|int $key): string|int;
}
