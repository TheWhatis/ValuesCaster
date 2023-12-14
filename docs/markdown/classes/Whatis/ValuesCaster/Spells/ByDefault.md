***

# ByDefault

Класс преобразователя
который позвояет
установить значение
по-умолчанию

PHP version 8
* Full name: `\Whatis\ValuesCaster\Spells\ByDefault`
* This class implements:
[`\Whatis\ValuesCaster\ISpell`](../ISpell.md)

**See Also:**

* https://github.com/TheWhatis/ValuesCaster - 



## Properties


### value

Значение по-умолчанию

```php
protected mixed $value
```






***

## Methods


### __construct

Обработать переданные аргументы

```php
public __construct(mixed $value = null): mixed
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$value` | **mixed** | Значение |




***

### cast

Установить значение по-умолчанию

```php
public cast(mixed $value, \Whatis\ValuesCaster\Context\ArrayTransformerContext $context = null): mixed
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$value` | **mixed** | Значение |
| `$context` | **\Whatis\ValuesCaster\Context\ArrayTransformerContext** | Вспомогательный класс для работы<br />с составными элементами |




***


***
> Automatically generated on 2023-12-14
