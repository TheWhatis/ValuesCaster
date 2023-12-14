<?php
/**
 * Файл с классом для
 * преобразования значения
 * в строку
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
use Stringable;

/**
 * Преобразовать в строку
 *
 * PHP version 8
 *
 * @category Spells
 * @package  ValuesCaster
 * @author   Whatis <anton-gogo@mail.ru>
 * @license  unlicense
 * @link     https://github.com/TheWhatis/ValuesCaster
 */
class Str implements ISpell
{
    /**
     * Преобразовать в строку
     *
     * @param mixed $value Значение
     *
     * @return string
     */
    public function cast(mixed $value): string
    {
        if (is_object($value) && !$value instanceof Stringable) {
            return get_class($value);
        }

        if (is_array($value)) {
            return '['
                . implode(', ', array_map([$this, 'cast'], $value))
                . ']';
        }

        if (is_bool($value)) {
            return $value ? 'true' : 'false';
        }

        return (string) $value;
    }
}
