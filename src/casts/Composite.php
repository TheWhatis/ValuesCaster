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

use Whatis\PhpCast\Attributes;

use Whatis\PhpCast\SetDataReference;
use Whatis\PhpCast\KeyChange;

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
#[Attributes\WithMissed]
class Composite extends BaseCast implements KeyChange,
    SetDataReference
{
    /**
     * Преобразователь, который
     * будет использоваться
     *
     * @var ?Cast
     */
    public ?Cast $cast = null;

    /**
     * Ссылка на массив с данными
     *
     * @var mixed
     */
    public mixed $data = null;

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
     * Установить ссылку на данные
     *
     * {@see Cast::castUnit}
     *
     * @param array $data Данные
     *
     * @return void
     */
    public function setDataReference(array &$data): void
    {
        $this->data = &$data;
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
     * Получить и, возможно,
     * изменить ключ значения
     *
     * {@see Cast::cast}
     *
     * @param string|int $key Ключ
     *
     * @return string|int
     */
    public function keyChange(string|int $key): string|int
    {
        foreach ($this->arguments as $cast) {
            if ($cast instanceof KeyChange) {
                $key = $cast->keyChange($key);
            }
        }

        return $key;
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
                // Если преобразователь принимает
                // в себя данные по ссылке
                if ($cast instanceof SetDataReference) {
                    $cast->setDataReference($this->data);
                }

                $class = new ReflectionClass($cast);
                $onlyMissed = $class->getAttributes(
                    Attributes\OnlyMissed::class
                );

                // Пропускаем полученное значение, если
                // преобразователь принимает только
                // пропущенные
                if (!$miss && $onlyMissed) {
                    continue;
                }

                // Пропускаем пропущенное значение, если
                // преобразователь не принимает такие
                if ($miss && !($onlyMissed || $class->getAttributes(
                    Attributes\WithMissed::class
                ))
                ) {
                    continue;
                }

                // Преобразовываем сгенерированный
                // массив со значением
                $value = $cast->cast($value, $miss);

                // Если значение было пропущено и
                // в следствии работы преобразователя
                // не было получено, то в след-й
                // преобразователь его тоже не нужно
                // передавать
                $miss = $miss && !is_null($value) ?: true;
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
