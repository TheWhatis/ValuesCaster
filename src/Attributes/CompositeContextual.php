<?php
/**
 * Файл с атрибутом, отвечающим
 * за определение, что
 * преобразователь может
 * работать с контекстом
 * компновщика
 * `Composite`
 *
 * PHP version 8
 *
 * @category Attributes
 * @package  ValuesCaster
 * @author   Whatis <anton-gogo@mail.ru>
 * @license  unlicense
 * @link     https://github.com/TheWhatis/ValuesCaster
 */

namespace Whatis\ValuesCaster\Attributes;

use Attribute;

/**
 * Атрибут, отвечающий
 * за определение, что
 * преобразователь может
 * работать с контекстом
 * компновщика
 * `Composite`
 *
 * PHP version 8
 *
 * @category Attributes
 * @package  ValuesCaster
 * @author   Whatis <anton-gogo@mail.ru>
 * @license  unlicense
 * @link     https://github.com/TheWhatis/ValuesCaster
 */
#[Attribute(Attribute::TARGET_CLASS|Attribute::TARGET_METHOD)]
class CompositeContextual
{
    /**
     * Название параметра, в который
     * будет передаваться контекст
     * для преобразователя
     *
     * @var string
     */
    protected string $name;

    /**
     * Иницилизация атрибута
     *
     * @param string $name Название параметра
     */
    public function __construct(string $name = 'context')
    {
        $this->name = $name;
    }

    /**
     * Получить зазвание параметра
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
