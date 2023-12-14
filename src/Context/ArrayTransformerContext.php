<?php
/**
 * Файл с контекстом
 * выполнения преобразования
 * `ArrayTransformer`
 *
 * PHP version 8
 *
 * @category Context
 * @package  ValuesCaster
 * @author   Whatis <anton-gogo@mail.ru>
 * @license  unlicense
 * @link     https://github.com/TheWhatis/ValuesCaster
 */

namespace Whatis\ValuesCaster\Context;

use Whatis\ValuesCaster\Spells\ArrayTransformer;
use Whatis\Support\Arr;

/**
 * Контекст выполнения
 * преобразования `ArrayTransformer`
 *
 * PHP version 8
 *
 * @category Context
 * @package  ValuesCaster
 * @author   Whatis <anton-gogo@mail.ru>
 * @license  unlicense
 * @link     https://github.com/TheWhatis/ValuesCaster
 */
class ArrayTransformerContext extends BaseExecutionContext
{
    /**
     * Свойство, в которой
     * хранится флаг, отвечающий
     * за определние, было ли
     * значение пропущено в
     * массиве
     *
     * @var bool
     */
    protected bool $missed;

    /**
     * Пропустить ли работу текущего преобразователя
     *
     * @var bool
     */
    protected bool $skip = false;

    /**
     * Ключ, под которым
     * установлено это
     * значение
     *
     * @var string|int
     */
    protected string|int $key;

    /**
     * Данные в целом
     *
     * @var array
     */
    protected array $array;

    /**
     * Иницилизация класса
     *
     * @param ArrayTransformer $arrayTransformer Корневой объект
     * @param array            $array            Общий массив
     * @param string|int       $key              Используемый ключ
     * @param bool             $missedFlag       Флаг о том, что
     *                                           значение пропущено
     */
    public function __construct(
        ArrayTransformer $arrayTransformer,
        array $array,
        string|int $key,
        bool $missedFlag
    ) {
        $this->setRoot($arrayTransformer);
        $this->setArray($array);
        $this->setKey($key);
        $this->missed($missedFlag);
    }

    /**
     * Установить флаг что значение
     * не было пропущено
     *
     * @param bool $flag Флаг
     *
     * @return void
     */
    public function missed(bool $flag): void
    {
        $this->missed = $flag;
    }

    /**
     * Пропущено ли значение
     *
     * @return bool
     */
    public function isMissed(): bool
    {
        return $this->missed;
    }

    /**
     * Пропустить ли преобразование значения
     *
     * @return bool
     */
    public function shouldSkip(): bool
    {
        return $this->skip;
    }

    /**
     * Установить, что это преобразование
     * необходимо будет приостановить
     *
     * @return void
     */
    public function skip(): void
    {
        $this->skip = true;
    }

    /**
     * Установить что это преобразование
     * не надо пропускать
     *
     * @return void
     */
    public function notSkip(): void
    {
        $this->skip = false;
    }

    /**
     * Изменить ключ
     *
     * @param string|int $key Ключ
     *
     * @return void
     */
    public function setKey(string|int $key): void
    {
        $this->key = $key;
    }

    /**
     * Получить ключ
     *
     * @return string|int
     */
    public function getKey(): string|int
    {
        return $this->key;
    }

    /**
     * Установить общий массив
     *
     * @param array $array Массив
     *
     * @return void
     */
    public function setArray(array $array): void
    {
        $this->array = $array;
    }

    /**
     * Установить новое значение в общие данные
     *
     * @param string|int $key   Ключ
     * @param mixed      $value Значение
     *
     * @return void
     */
    public function set(string|int $key, mixed $value): void
    {
        Arr::set($this->array, $key, $value);
    }

    /**
     * Удалить значение из общих данных
     *
     * @param string|int $key Ключ
     *
     * @return void
     */
    public function unset(string|int $key): void
    {
        Arr::unset($this->array, $key);
    }

    /**
     * Получить массив
     *
     * @return ?array
     */
    public function getArray(): ?array
    {
        return $this->array;
    }
}
