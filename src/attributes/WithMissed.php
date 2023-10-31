<?php
/**
 * Файл с атрибутом для
 * реализации передачи
 * пропущенных значений
 *
 * PHP version 8
 *
 * @category Cast
 * @package  PhpCast
 * @author   Whatis <anton-gogo@mail.ru>
 * @license  unlicense
 * @link     https://github.com/TheWhatis/PhpCast
 */

namespace Whatis\PhpCast\Attributes;

use Attribute;

/**
 * Класс атрибута-флага
 * обозначающий, что
 * в преобразователь
 * нужно передавать ещё и
 * пропущенные значения
 *
 * PHP version 8
 *
 * @category Cast
 * @package  PhpCast
 * @author   Whatis <anton-gogo@mail.ru>
 * @license  unlicense
 * @link     https://github.com/TheWhatis/PhpCast
 */
#[Attribute(Attribute::TARGET_CLASS)]
class WithMissed
{
    // ...
}
