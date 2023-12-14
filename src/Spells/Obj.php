<?php
/**
 * Файл с классом для
 * преобразования значения
 * в object
 *
 * PHP version 8
 *
 * @category Spells
 * @package  ValuesCaster
 * @author   Whatis <anton-gogo@mail.ru>
 * @license  unlicense
 * @link     https://github.com/TheWhatis/ValuesCaster
 */

namespace Whatis\ValuesCaster\Spells;

use Whatis\ValuesCaster\ISpell;

/**
 * Преобразовать в object
 *
 * PHP version 8
 *
 * @category Spells
 * @package  ValuesCaster
 * @author   Whatis <anton-gogo@mail.ru>
 * @license  unlicense
 * @link     https://github.com/TheWhatis/ValuesCaster
 */
class Obj implements ISpell
{
    /**
     * Преобразовать в object
     *
     * @param mixed $value Значение
     *
     * @return object
     */
    public function cast(mixed $value): object
    {
        return (object) $value;
    }
}
