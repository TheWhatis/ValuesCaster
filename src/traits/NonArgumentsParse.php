<?php
/**
 * Файл с трейтом, реализуюим
 * абстрактный метод
 * `parseArguments`
 * из `TCast`
 *
 * PHP version 8
 *
 * @category Traits
 * @package  PhpCast
 * @author   Whatis <anton-gogo@mail.ru>
 * @license  unlicense
 * @link     https://github.com/TheWhatis/PhpCast
 */

namespace Whatis\PhpCast\Traits;

/**
 * Трейт, реализующий абстрактный
 * метод `parseArguments`
 * из `TCast`
 *
 * Трейт-затычка, просто пропускает
 * переданные аргументы дальше
 * без их обработки
 *
 * PHP version 8
 *
 * @category Traits
 * @package  PhpCast
 * @author   Whatis <anton-gogo@mail.ru>
 * @license  unlicense
 * @link     https://github.com/TheWhatis/PhpCast
 */
trait NonArgumentsParse
{
    /**
     * Обработать переданные аргументы
     *
     * @param array $arguments Аргументы
     *
     * @return array Обработанные аргументы
     */
    protected function parseArguments(array $arguments): array
    {
        return $arguments;
    }
}
