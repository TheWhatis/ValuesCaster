***

# SkipIf

Преобразователь
для компановщика за счёт
которого можно полностью
отменить все изменения
если не было пройдено
условие

PHP version 8
* Full name: `\Whatis\ValuesCaster\Spells\Composite\SkipIf`
* This class implements:
[`\Whatis\ValuesCaster\ISpell`](../../ISpell.md)

**See Also:**

* https://github.com/TheWhatis/ValuesCaster - 



## Properties


### condition

Callback функция условия

```php
protected \Closure $condition
```






***

### spell

Преобразователь

```php
protected \Whatis\ValuesCaster\ISpell $spell
```






***

## Methods


### __construct

Иницилизация преобразователя

```php
public __construct(callable $condition, \Whatis\ValuesCaster\ISpell $spell): mixed
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$condition` | **callable** | Условие |
| `$spell` | **\Whatis\ValuesCaster\ISpell** | Преобразователь |




***

### cast

Преобразовать в массив

```php
public cast(mixed $value, \Whatis\ValuesCaster\Context\CompositeContext $context = null): mixed
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$value` | **mixed** | Значение |
| `$context` | **\Whatis\ValuesCaster\Context\CompositeContext** | Контекст |




***


***
> Automatically generated on 2023-12-14
