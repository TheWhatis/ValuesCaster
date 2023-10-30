<?php
/**
 * Файл с трейтом, реализующим
 * интерфейс `ICast`
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
 * Трейт, реализующий
 * `ICast`
 *
 * PHP version 8
 *
 * @category Cast
 * @package  PhpCast
 * @author   Whatis <anton-gogo@mail.ru>
 * @license  unlicense
 * @link     https://github.com/TheWhatis/PhpCast
 */
trait TCast
{
    /**
     * Аргументы
     *
     * @var array
     */
    public array $arguments;

    /**
     * Иницилизация правила
     *
     * @param array $arguments Приоритет
     */
    public function __construct(array $arguments = []) {
        $this->arguments = $this->parseArguments($arguments);
    }

    /**
     * Обработать переданные аргументы
     *
     * @param array $arguments Аргументы
     *
     * @return array Обработанные аргументы
     */
    abstract protected function parseArguments(array $arguments): array;
}
