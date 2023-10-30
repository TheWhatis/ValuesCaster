<?php
/**
 * Файл с интерфейсом для
 * `ICast`, позволяющий
 * получать пропущенные
 * в данных значения
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
 * Интерфейс для ICast,
 * позволяющий получать
 * пропущенные в данных
 * значения
 *
 * PHP version 8
 *
 * @category Cast
 * @package  PhpCast
 * @author   Whatis <anton-gogo@mail.ru>
 * @license  unlicense
 * @link     https://github.com/TheWhatis/PhpCast
 */
interface IsMissed
{
    /**
     * Применить преобразование
     *
     * Дополненный для `ICast` метод
     *
     * @param mixed $value Значение
     * @param bool  $miss  Передано ли пропущенное значение
     *
     * @return mixed
     */
    public function cast(mixed $value, bool $miss = false): mixed;
}
