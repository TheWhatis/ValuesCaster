<?php
/**
 * Файл с интерфесом
 * правила преобразования
 *
 * PHP version 8
 *
 * @category Cast
 * @package  PhpCast
 * @author   Whatis <anton-gogo@mail.ru>
 * @license  unlicense
 * @link     https://github.com/TheWhatis/PhpCast
 */

namespace Whatis\PhpCast;

/**
 * Интерфейс правила
 * преобразования
 *
 * Чтобы передавались значения, которые
 * были пропущены, вы можете установить
 * атрибут {@see Attributes\WithMissed}
 * на ваш класс
 *
 * Если передан `WithMissed`, то дополнительно
 * в метод будет передается `bool` значение
 * `$miss`, в котором `false` - если передано
 * не пропущенное значение и `true` если
 * пропущенное
 *
 * Либо если вам в преобразователе нужно
 * получать исключительно пропущенные
 * значения, используйте атрибут
 * {@see Attributes\OnlyMissed}
 * на вашем классе
 *
 * В таком случае в `$value` будет передаваться
 * всегда `null`
 *
 * PHP version 8
 *
 * @category Cast
 * @package  PhpCast
 * @author   Whatis <anton-gogo@mail.ru>
 * @license  unlicense
 * @link     https://github.com/TheWhatis/PhpCast
 */
interface ICast
{
    /**
     * Иницилизация правила
     *
     * @param array $arguments Аргументы для него
     */
    public function __construct(array $arguments = []);

    /**
     * Получить название преобразования
     *
     * @return array|string $name Название преобразования
     */
    public static function getName(): array|string;

    /**
     * Применить преобразование
     *
     * Чтобы передавались значения, которые
     * были пропущены, вы можете установить
     * атрибут {@see Attributes\WithMissed}
     * на ваш класс
     *
     * Если передан `WithMissed`, то дополнительно
     * в метод будет передается `bool` значение
     * `$miss`, в котором `false` - если передано
     * не пропущенное значение и `true` если
     * пропущенное
     *
     * Либо если вам в преобразователе нужно
     * получать исключительно пропущенные
     * значения, используйте атрибут
     * {@see Attributes\OnlyMissed}
     * на вашем классе
     *
     * В таком случае в `$value` будет передаваться
     * всегда null
     *
     * @param mixed $value Значение
     *
     * @return mixed
     */
    public function cast(mixed $value): mixed;
}
