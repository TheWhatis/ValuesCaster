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
interface WithDataReference
{
    /**
     * Установить ссылку на данные, которые
     * были переданы в `Cast::cast()`
     *
     * @param array $data Данные
     *
     * @return void
     */
    public function setDataReference(array &$data): void;
}
