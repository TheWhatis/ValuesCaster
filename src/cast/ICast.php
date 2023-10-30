<?php
/**
 * Файл с интерфесом
 * правила преобразования
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
 * Интерфейс правила
 * преобразования
 *
 * PHP version 8
 *
 * @category Cast
 * @package  PhpCast
 * @author   Whatis <anton-gogo@mail.ru>
 * @license  unlicense
 * @link     https://github.com/TheWhatis/PhpCast
 */
interface ICast
{
    /**
     * Иницилизация правила
     *
     * @param array $arguments Аргументы для него
     */
    public function __construct(array $arguments = []);

    /**
     * Получить название преобразования
     *
     * @return array|string $name Название преобразования
     */
    public static function getName(): array|string;
}
