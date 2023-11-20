<?php
/**
 * Файл с интерфейсом, реализующим
 * передачу ссылки на
 * переданные данные
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

namespace Whatis\PhpCast;

/**
 * Интерфейс, реализующий
 * передачу ссылки на
 * переданные данные
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
interface SetDataReference
{
    /**
     * Установить ссылку на данные
     *
     * {@see Cast::cast}
     *
     * @param array $data Данные
     *
     * @return void
     */
    public function setDataReference(array &$data): void;
}
