<?php
/**
 * Файл с интерфейсом для `ICast`,
 * который ограничивает
 * получение данных до тех,
 * которые были пропущены
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
 * Интерфейс для `ICast`,
 * который ограничивает
 * получение данных до тех,
 * которые были пропущены
 *
 * PHP version 8
 *
 * @category Cast
 * @package  PhpCast
 * @author   Whatis <anton-gogo@mail.ru>
 * @license  unlicense
 * @link     https://github.com/TheWhatis/PhpCast
 */
interface OnlyMissed
{
    /**
     * Применить преобразование
     *
     * Урезанный ICast метод
     *
     * Поскольку параметры пропущены,
     * то остается только вернуть
     * новое значение
     *
     * @return mixed
     */
    public function cast(): mixed;
}
