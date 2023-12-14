<?php
/**
 * Файл с интерфесом
 * правила преобразования
 *
 * PHP version 8
 *
 * @category Creational
 * @package  ValuesCaster
 * @author   Whatis <anton-gogo@mail.ru>
 * @license  unlicense
 * @link     https://github.com/TheWhatis/ValuesCaster
 */

namespace Whatis\ValuesCaster;

/**
 * Интерфейс преобразователя
 *
 * PHP version 8
 *
 * @category Creational
 * @package  ValuesCaster
 * @author   Whatis <anton-gogo@mail.ru>
 * @license  unlicense
 * @link     https://github.com/TheWhatis/ValuesCaster
 */
interface ISpell
{
    /**
     * Применить преобразование
     *
     * @param mixed $value Значение
     *
     * @return mixed Преобразованное значение
     */
    public function cast(mixed $value): mixed;
}
