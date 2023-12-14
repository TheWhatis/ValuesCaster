<?php
/**
 * Файл с контекстом
 * выполнения преобразования
 * `Composite`
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

use Whatis\ValuesCaster\Spells\Composite;

/**
 * Контекст выполнения
 * преобразования `Composite`
 *
 * PHP version 8
 *
 * @category Context
 * @package  ValuesCaster
 * @author   Whatis <anton-gogo@mail.ru>
 * @license  unlicense
 * @link     https://github.com/TheWhatis/ValuesCaster
 */
class CompositeContext extends BaseExecutionContext
{
    /**
     * Свойство, в которой хранится
     * флаг, отвечающий за определине,
     * нужно ли прекратить перебор
     * преоразователей
     *
     * @var bool
     */
    protected bool $break = false;

    /**
     * Свойство, в котором хранится
     * флаг, отвечающий за определение,
     * нужно ли пропустить текущее
     * преобразование в ходе работы
     * компновщика
     *
     * @var bool
     */
    protected bool $skip = false;

    /**
     * Свойство, в котором хранится
     * флаг, отвечающий за определение,
     * нужно ли отменить все изменения
     * при работе компоновщика
     *
     * @var bool
     */
    protected bool $cancel = false;

    /**
     * Иницилизация класса
     *
     * @param Composite $composite компоновщик
     */
    public function __construct(Composite $composite)
    {
        $this->setRoot($composite);
    }

    /**
     * Приостановить перебор преобразователей
     *
     * @return void
     */
    public function break(): void
    {
        $this->break = true;
    }

    /**
     * Восстановить перебор преобразователей
     *
     * @return void
     */
    public function notBreak(): void
    {
        $this->break = false;
    }

    /**
     * Установить, что преобразования,
     * произведенные в компоновщике,
     * должны быть пропущены
     *
     * @param bool $break Остановить ли работу компноновщика
     *
     * @return void
     */
    public function skip(bool $break = false): void
    {
        if ($break) {
            $this->break();
        }

        $this->skip = true;
    }

    /**
     * Установить, что преобразования
     * произведенные в компоновщике,
     * не надо пропускать
     *
     * @return void
     */
    public function notSkip(): void
    {
        $this->skip = false;
    }

    /**
     * Отменить изменения
     *
     * @return void
     */
    public function cancel(): void
    {
        $this->cancel = true;
    }

    /**
     * Не отменять изменения
     *
     * @return void
     */
    public function notCancel(): void
    {
        $this->cancel = false;
    }

    /**
     * Приостановить ли перебор преобразователей
     *
     * @return bool
     */
    public function shouldBreak(): bool
    {
        return $this->break;
    }

    /**
     * Пропустить ли преобразователь
     *
     * @return bool
     */
    public function shouldSkip(): bool
    {
        return $this->skip;
    }

    /**
     * Отменить ли изменения
     *
     * @return bool
     */
    public function shouldCancel(): bool
    {
        return $this->cancel;
    }
}
