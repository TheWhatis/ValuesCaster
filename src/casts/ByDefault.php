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
use Whatis\PhpCast\Attributes\OnlyMissed;

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
#[OnlyMissed]
class ByDefault extends BaseCast
{
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
     * Установить значение по-умолчанию
     *
     * @return mixed
     */
    public function cast(mixed $value): mixed
    {
        return array_key_exists('value', $this->arguments)
            ? $this->arguments['value']
            : $this->arguments[0];
    }
}
