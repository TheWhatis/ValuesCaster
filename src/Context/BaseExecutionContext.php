<?php
/**
 * Файл с интерфейсом вспомогательного
 * класса с контекстом
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

use Whatis\ValuesCaster\ISpell;

/**
 * Интерфейс вспомогательного
 * класса с контекстом
 *
 * PHP version 8
 *
 * @category Context
 * @package  ValuesCaster
 * @author   Whatis <anton-gogo@mail.ru>
 * @license  unlicense
 * @link     https://github.com/TheWhatis/ValuesCaster
 */
class BaseExecutionContext implements IExecutionContext
{
    /**
     * Корневой объект
     *
     * @var ISpell
     */
    protected ISpell $root;

    /**
     * Установить корневой объект
     *
     * @param ISpell $spell Преобразователь
     *
     * @return void
     */
    protected function setRoot(ISpell $root): void
    {
        $this->root = $root;
    }

    /**
     * Получить корневой объект, откуда
     * был вызван текущий преобразователь
     *
     * @return ISpell
     */
    public function getRoot(): ISpell
    {
        return $this->root;
    }
}
