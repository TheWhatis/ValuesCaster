<?php
/**
 * Файл с классом для
 * преобразования значения
 * в int
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
 * Преобразовать в int
 *
 * PHP version 8
 *
 * @category Spells
 * @package  ValuesCaster
 * @author   Whatis <anton-gogo@mail.ru>
 * @license  unlicense
 * @link     https://github.com/TheWhatis/ValuesCaster
 */
class Integer implements ISpell
{
    /**
     * Преобразовать в int
     *
     * @param mixed $value Значение
     *
     * @return int
     */
    public function cast(mixed $value): int
    {
        return (int) $value;
    }
}
