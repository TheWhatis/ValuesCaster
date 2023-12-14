<?php
/**
 * Файл с преобразователем,
 * который позволяет установить
 * значение по-умолчанию
 *
 * PHP version 8
 *
 * @category Spells
 * @package  ValuesCaster
 * @author   Whatis <anton-gogo@mail.ru>
 * @license  unlicense
 * @link     https://github.com/TheWhatis/ValuesCaster
 */

namespace Whatis\ValuesCaster\Spells;

use Whatis\ValuesCaster\ISpell;
use Whatis\ValuesCaster\Attributes\ArrayTransformerContextual;
use Whatis\ValuesCaster\Context\ArrayTransformerContext as ATContext;

/**
 * Класс преобразователя
 * который позвояет
 * установить значение
 * по-умолчанию
 *
 * PHP version 8
 *
 * @category Spells
 * @package  ValuesCaster
 * @author   Whatis <anton-gogo@mail.ru>
 * @license  unlicense
 * @link     https://github.com/TheWhatis/ValuesCaster
 */
class ByDefault implements ISpell
{
    /**
     * Значение по-умолчанию
     *
     * @var mixed
     */
    protected mixed $value;

    /**
     * Обработать переданные аргументы
     *
     * @param mixed $value Значение
     */
    public function __construct(mixed $value = null)
    {
        $this->value = $value;
    }

    /**
     * Установить значение по-умолчанию
     *
     * @param mixed     $value   Значение
     * @param ATContext $context Вспомогательный класс для работы
     *                           с составными элементами
     *
     * @return mixed
     */
    #[ArrayTransformerContextual]
    public function cast(
        mixed $value, ATContext $context = null
    ): mixed {
        // Если преобразователь был использован
        // отдельно от массива или если
        // значение было пропущено в массиве,
        // то устанавливаем его
        if (!$context || $context->isMissed()) {
            return $this->value;
        }

        // Ничего не преобразовываем
        return $context->skip();
    }
}
