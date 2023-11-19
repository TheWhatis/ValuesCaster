***

# Composite

Компановщик для преобразователей

PHP version 8
* Full name: `\Whatis\PhpCast\Casts\Composite`
* Parent class: [`\Whatis\PhpCast\BaseCast`](../BaseCast.md)

**See Also:**

* https://github.com/TheWhatis/PhpCast - 



## Properties


### cast

Преобразователь, который
будет использоваться

```php
public ?\Whatis\PhpCast\Cast $cast
```






***

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

### parseArguments

Обработать переданные аргументы

```php
protected parseArguments(array $arguments): array
```

Валидация переданных преобразователей
в композитор






**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$arguments` | **array** | Аргументы |




***

### cast

Запускаем композитор преобразователей

```php
public cast(mixed $value, bool $miss = false): mixed
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$value` | **mixed** | Значение |
| `$miss` | **bool** | Было ли пропущено |




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
