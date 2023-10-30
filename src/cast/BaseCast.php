<?php
/**
 * Файл с абстрактным классом
 * правила преобразования,
 * реализующимосновные методы
 * для его работы
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
 * Абстрактный класс правила
 * преобразования, реализующий
 * основные методы для его работы
 *
 * PHP version 8
 *
 * @category Cast
 * @package  PhpCast
 * @author   Whatis <anton-gogo@mail.ru>
 * @license  unlicense
 * @link     https://github.com/TheWhatis/PhpCast
 */
abstract class BaseCast implements ICast, Standart
{
    use TCast;
}
