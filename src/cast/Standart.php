<?php
/**
 * Файл с интерфейсом, дополняющий
 * `ICast` для непосредтвенно
 * метода, который позволяет
 * преобразовывать значения
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
 * Интерфейс, дополняющий
 * `ICast` для непосредтвенно
 * метода, который позволяет
 * преобразовывать значения
 *
 * PHP version 8
 *
 * @category Cast
 * @package  PhpCast
 * @author   Whatis <anton-gogo@mail.ru>
 * @license  unlicense
 * @link     https://github.com/TheWhatis/PhpCast
 */
interface Standart
{
    /**
     * Применить преобразование
     *
     * @param mixed $value Значение
     *
     * @return mixed
     */
    public function cast(mixed $value): mixed;
}