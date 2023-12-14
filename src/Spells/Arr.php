<?php
/**
 * Файл с классом для
 * преобразования значения
 * в массив
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
 * Преобразовать в массив
 *
 * PHP version 8
 *
 * @category Spells
 * @package  ValuesCaster
 * @author   Whatis <anton-gogo@mail.ru>
 * @license  unlicense
 * @link     https://github.com/TheWhatis/ValuesCaster
 */
class Arr implements ISpell
{
    /**
     * Преобразовать в массив
     *
     * @param mixed $value Значение
     *
     * @return array
     */
    public function cast(mixed $value): array
    {
        return (array) $value;
    }
}
