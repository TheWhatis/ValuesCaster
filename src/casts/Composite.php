<?php
/**
 * Файл с классом для
 * преобразования значения
 * в int
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

use Whatis\PhpCast\Cast;
use Whatis\PhpCast\BaseCast;
use Whatis\PhpCast\Attributes\WithMissed;

use Whatis\Support\Arr;
use InvalidArgumentException;

/**
 * Компановщик для преобразователей
 *
 * PHP version 8
 *
 * @category Cast
 * @package  PhpCast
 * @author   Whatis <anton-gogo@mail.ru>
 * @license  unlicense
 * @link     https://github.com/TheWhatis/PhpCast
 */
#[WithMissed]
class Composite extends BaseCast
{
    /**
     * Преобразователь, который
     * будет использоваться
     *
     * @var ?Cast
     */
    public ?Cast $cast = null;

    /**
     * Получить название преобразования
     *
     * @return array $name Название преобразования
     */
    public static function getName(): array
    {
        return [ 'compose', 'composite' ];
    }

    /**
     * Обработать переданные аргументы
     *
     * Валидация переданных преобразователей
     * в композитор
     *
     * @param array $arguments Аргументы
     *
     * @return array
     */
    protected function parseArguments(array $arguments): array
    {
        // Валидация преобразователей
        $this->cast->setCasts($arguments);

        // Возвращаем как список аргументов
        return $this->cast->getCasts();
    }

    /**
     * Запускаем композитор преобразователей
     *
     * @param mixed $value Значение
     * @param bool  $miss  Было ли пропущено
     *
     * @return mixed
     * @throw  Exception
     */
    public function cast(mixed $value, bool $miss = false): mixed
    {
        // "Родительское" сообщение об ошибке
        // возникшее при работе Cast
        $message = 'Passed invalid cast: :cast';

        // Перебираем преобразователи
        foreach ($this->arguments as $cast) {
            try {
                // Устанавливаем очередной
                // преобразователь
                $this->cast->setCasts([$cast]);

                // Если значение пропущено, то
                // в оно не будет передано в
                // преобразователь
                $arr = $miss ? [] : [$value];

                // Преобразовываем сгенерированный
                // массив со значением
                $value = $this->cast->cast($arr);

                // Если значение было пропущено и
                // в следствии работы преобразователя
                // не было получено, то в след-й
                // преобразователь его тоже не нужно
                // передавать
                $miss = $miss && count($value) ?: true;

                // Исключаем возможность изменения
                // ключа для значения
                $value = array_values($value);

                // Исключаем возможного удаления
                // элемента сгенерированного
                // массива для преобразования ($arr)
                $value = $value[0] ?? $arr[0] ?? null;
            } catch (InvalidArgumentException $exception) {
                if (is_object($cast)) {
                    throw new InvalidArgumentException(
                        strtr($message, ':cast', get_class($cast)),
                        previous: $exception
                    );
                }

                throw new InvalidArgumentException(
                    strtr($message, ':cast', (string) $cast),
                    previous: $exception
                );
            }
        }

        // Возвращаем изменённое значение
        return $value;
    }
}
