# Библиотека для использования и создания своих преобразователей
## Документация
  * [Documentation](https://github.com/TheWhatis/ValuesCaster/tree/master/docs/markdown/Home.md "Documentation")
## Установка
```
composer require whatis/values-caster
```
## Использование
```php
<?php
use Whatis\ValuesCaster\Spells;

// Преобразовываем строковое число в обычное
$value = '1';
$spell = new Spells\Integer;

$value = $spell->cast($value);
```

## Создание своих преобразователей
```php
<?php
namespace Whatis\Example\Spells;

// Основной интерфейс
use Whatis\ValuesCaster\ISpell;

// Заглушка для метода, принимающего аргументы (конструктора)
use Whatis\ValuesCaster\ISpellConstructStub;

/**
 * Преобразовать в строку 'change'
 *
 * PHP version 8
 *
 * @category Spells
 * @package  Example
 * @author   Whatis <anton-gogo@mail.ru>
 * @license  unlicense
 * @link     https://github.com/TheWhatis/ValuesCaster
 */
class ToChangeString implements ISpell
{
    /**
     * Преобразовать в массив
     *
     * @param mixed $value Значение
     *
     * @return array
     */
    public function cast(mixed $value): array
    {
        return 'change';
    }
}
```
