***

# Arr

Преобразовать в массив

PHP version 8
* Full name: `\Whatis\PhpCast\Casts\Arr`
* Parent class: [`\Whatis\PhpCast\BaseCast`](../BaseCast.md)

**See Also:**

* https://github.com/TheWhatis/PhpCast - 




## Methods


### getName

Получить название преобразования

```php
public static getName(): array
```



* This method is **static**.





**Return Value:**

$name Название преобразования



***

### cast

Преобразовать в массив

```php
public cast(mixed $value): array
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$value` | **mixed** | Значение |




***


## Inherited methods


### __construct

Иницилизация правила

```php
public __construct(array $arguments = []): mixed
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$arguments` | **array** | Аргументы |




***

### parseArguments

Обработать переданные аргументы

```php
protected parseArguments(array $arguments): array
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$arguments` | **array** | Аргументы |


**Return Value:**

Обработанные аргументы



***


***
> Automatically generated on 2023-11-19