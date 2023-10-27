***

# ByDefault

Класс преобразователя
который позвояет
установить значение
по-умолчанию

PHP version 8

* Full name: `\Whatis\PhpCast\Casts\ByDefault`
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

### cast

Преобразовать в массив

```php
public cast(mixed $value, bool $miss = false): mixed
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$value` | **mixed** | Значение |
| `$miss` | **bool** | Передано ли пропущенное значение |




***


## Inherited methods


### onlyMissed

Отправлять ли исключительно значения,
которые были пропущены

```php
public static onlyMissed(): bool
```



* This method is **static**.







***

### __construct

Иницилизация правила

```php
public __construct(array $arguments = []): mixed
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$arguments` | **array** | Приоритет |




***

### parseArguments

Обработать переданные аргументы

```php
protected parseArguments(array $arguments): array
```




* This method is **abstract**.



**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$arguments` | **array** | Аргументы |


**Return Value:**

Обработанные аргументы



***


***
> Automatically generated from source code comments on 2023-10-27 using [phpDocumentor](http://www.phpdoc.org/) and [saggre/phpdocumentor-markdown](https://github.com/Saggre/phpDocumentor-markdown)
