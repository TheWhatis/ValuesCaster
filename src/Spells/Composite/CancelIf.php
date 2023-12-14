<?php
/**
 * Файл с преобразователем
 * для компановщика за счёт
 * которого можно полностью
 * отменить все изменения
 * если не было пройдено
 * условие
 *
 * PHP version 8
 *
 * @category Spells
 * @package  ValuesCaster
 * @author   Whatis <anton-gogo@mail.ru>
 * @license  unlicense
 * @link     https://github.com/TheWhatis/ValuesCaster
 */

namespace Whatis\ValuesCaster\Spells\Composite;

use Whatis\ValuesCaster\ISpell;
use Whatis\ValuesCaster\Context\CompositeContext;
use Whatis\ValuesCaster\Attributes\CompositeContextual;

use Closure;

/**
 * Преобразователь
 * для компановщика за счёт
 * которого можно полностью
 * отменить все изменения
 * если не было пройдено
 * условие
 *
 * PHP version 8
 *
 * @category Spells
 * @package  ValuesCaster
 * @author   Whatis <anton-gogo@mail.ru>
 * @license  unlicense
 * @link     https://github.com/TheWhatis/ValuesCaster
 */
class CancelIf implements ISpell
{
    /**
     * Callback функция условия
     *
     * @var Closure
     */
    protected Closure $condition;

    /**
     * Иницилизация преобразователя
     *
     * @param callable $condition Условие
     */
    public function __construct(callable $condition)
    {
        $this->condition = Closure::fromCallable($condition);
    }

    /**
     * Преобразовать в массив
     *
     * @param mixed            $value   Значение
     * @param CompositeContext $context Контекст
     *
     * @return mixed
     */
    #[CompositeContextual]
    public function cast(
        mixed $value, CompositeContext $context = null
    ): mixed {
        if ($context && ($this->condition)(...func_get_args())) {
            return $context->cancel();
        }

        return $value;
    }
}
