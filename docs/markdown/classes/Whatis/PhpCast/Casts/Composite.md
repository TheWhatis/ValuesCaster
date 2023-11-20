***

# Composite

Компановщик для преобразователей

PHP version 8
* Full name: `\Whatis\PhpCast\Casts\Composite`
* Parent class: [`\Whatis\PhpCast\BaseCast`](../BaseCast.md)
* This class implements:
[`\Whatis\PhpCast\KeyChange`](../KeyChange.md), [`\Whatis\PhpCast\SetDataReference`](../SetDataReference.md)

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

### data

Ссылка на массив с данными

```php
public mixed $data
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

### setDataReference

Установить ссылку на данные

```php
public setDataReference(array& $data): void
```

[\Whatis\PhpCast\Cast::castUnit]()






**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$data` | **array** | Данные |




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

### keyChange

Получить и, возможно,
изменить ключ значения

```php
public keyChange(string|int $key): string|int
```

[\Whatis\PhpCast\Cast::cast]()






**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$key` | **string&#124;int** | Ключ |




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
> Automatically generated on 2023-11-20
