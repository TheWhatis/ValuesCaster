***

# TCast

Трейт, реализующий
`ICast`

PHP version 8

* Full name: `\Whatis\PhpCast\TCast`

**See Also:**

* https://github.com/TheWhatis/PhpCast - 



## Properties


### arguments

Аргументы

```php
public array $arguments
```






***

## Methods


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
> Automatically generated from source code comments on 2023-10-30 using [phpDocumentor](http://www.phpdoc.org/) and [saggre/phpdocumentor-markdown](https://github.com/Saggre/phpDocumentor-markdown)

