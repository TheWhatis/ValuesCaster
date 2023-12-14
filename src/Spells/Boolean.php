<?php
/**
 * Файл с классом для
 * преобразования значения
 * в bool
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
 * Преобразовать в bool
 *
 * PHP version 8
 *
 * @category Spells
 * @package  ValuesCaster
 * @author   Whatis <anton-gogo@mail.ru>
 * @license  unlicense
 * @link     https://github.com/TheWhatis/ValuesCaster
 */
class Boolean implements ISpell
{
    /**
     * Преобразовать в bool
     *
     * @param mixed $value Значение
     *
     * @return bool
     */
    public function cast(mixed $value): bool
    {
        return (bool) $value;
    }
}
