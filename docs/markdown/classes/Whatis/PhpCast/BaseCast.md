***

# BaseCast

Абстрактный класс правила
преобразования, реализующий
основные методы для его работы

PHP version 8

* Full name: `\Whatis\PhpCast\BaseCast`
* This class implements:
[`\Whatis\PhpCast\ICast`](./ICast.md)
* This class is an **Abstract class**

**See Also:**

* https://github.com/TheWhatis/PhpCast - 






## Inherited methods


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

### onlyMissed

Отправлять ли исключительно значения,
которые были пропущены

```php
public static onlyMissed(): bool
```



* This method is **static**.







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
