***

# ICast

Интерфейс правила
преобразования

PHP version 8

* Full name: `\Whatis\PhpCast\ICast`

**See Also:**

* https://github.com/TheWhatis/PhpCast - 



## Methods


### __construct

Иницилизация правила

```php
public __construct(array $arguments = []): mixed
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$arguments` | **array** | Аргументы для него |




***

### getName

Получить название преобразования

```php
public static getName(): array|string
```



* This method is **static**.





**Return Value:**

$name Название преобразования



***

### isMissed

Отправлять ли значения, которые
была пропущены - не переданы
в массиве

```php
public static isMissed(): bool
```



* This method is **static**.







***

### onlyMissed

Отправлять ли исключительно значения,
которые были пропущены

```php
public static onlyMissed(): bool
```



* This method is **static**.







***

### cast

Применить преобразование

```php
public cast(mixed $value, bool $miss = false): mixed
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$value` | **mixed** | Значение |
| `$miss` | **bool** | Передано ли пропущенное значение |




***


***
> Automatically generated from source code comments on 2023-10-27 using [phpDocumentor](http://www.phpdoc.org/) and [saggre/phpdocumentor-markdown](https://github.com/Saggre/phpDocumentor-markdown)
