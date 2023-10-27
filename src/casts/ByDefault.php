<?php
/**
 * Файл с преобразователем,
 * который позволяет установить
 * значение по-умолчанию
 *
 * PHP version 8
 *
 * @category Cast
 * @package  PhpCast
 * @author   Whatis <anton-gogo@mail.ru>
 * @license  unlicense
 * @link     https://github.com/TheWhatis/PhpCast
 */

namespace Whatis\PhpCast\Casts;

use Whatis\PhpCast\BaseCast;
use Whatis\PhpCast\Traits\OnlyMissed;


/**
 * Класс преобразователя
 * который позвояет
 * установить значение
 * по-умолчанию
 *
 * PHP version 8
 *
 * @category Cast
 * @package  PhpCast
 * @author   Whatis <anton-gogo@mail.ru>
 * @license  unlicense
 * @link     https://github.com/TheWhatis/PhpCast
 */
class ByDefault extends BaseCast
{
    use OnlyMissed;

    /**
     * Получить название преобразования
     *
     * @return array $name Название преобразования
     */
    public static function getName(): array
    {
        return ['default', 'by_default', 'byDefault'];
    }

    /**
     * Обработать переданные аргументы
     *
     * @param array $arguments Аргументы
     *
     * @return array Обработанные аргументы
     */
    protected function parseArguments(array $arguments): array
    {
        return $arguments ? $arguments : ['value' => null];
    }

    /**
     * Преобразовать в массив
     *
     * @param mixed $value Значение
     * @param bool  $miss  Передано ли пропущенное значение
     *
     * @return mixed
     */
    public function cast(mixed $value, bool $miss = false): mixed
    {
        return array_key_exists('value', $this->arguments)
            ? $this->arguments['value']
            : $this->arguments[0];
    }
}
