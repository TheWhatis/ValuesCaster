***

# Str

Преобразовать в строку

PHP version 8
* Full name: `\Whatis\PhpCast\Casts\Str`
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

Преобразовать в строку

```php
public cast(mixed $value): string
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




***


***
> Automatically generated on 2023-11-19
