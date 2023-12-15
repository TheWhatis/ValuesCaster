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
class KeyChange implements ISpell
{
    /**
     * Значение по-умолчанию
     *
     * @var string
     */
    protected string $key;

    /**
     * Обработать переданные аргументы
     *
     * @param string|int $key Ключ
     */
    public function __construct(string|int $key)
    {
        $this->key = $key;
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
        if ($context) {
            $context->setKey($this->key);
        }

        return $value;
    }
}
