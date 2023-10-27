***

# Cast

Преобразовать в строку

PHP version 8

* Full name: `\Whatis\PhpCast\Cast`

**See Also:**

* https://github.com/TheWhatis/PhpCast - 



## Properties


### casts

Массив с ключами и правилами
преобразования

```php
public array $casts
```






***

### declaredCasts

Объявленные преобразователи

```php
public array $declaredCasts
```






***

## Methods


### __construct

Иницилизация класса

```php
public __construct(array $casts): mixed
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$casts` | **array** | Правила преобразования |




***

### getDeclaredCasts

Получить все объявленные
преобразователи

```php
public static getDeclaredCasts(): array
```



* This method is **static**.







***

### setCasts

Установить новые преобразования

```php
public setCasts(array $casts): void
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$casts` | **array** | Правила преобразования |




***

### castUnit

Применить отдельное преобразование

```php
protected castUnit(array& $data, string|int $key, \Whatis\PhpCast\ICast $cast): void
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$data` | **array** | Ссылка на данные |
| `$key` | **string&#124;int** | Ключ значения |
| `$cast` | **\Whatis\PhpCast\ICast** | Преобразователь |




***

### searchCast

Найти преобразователь
по названию

```php
protected searchCast(string $name): string
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$name` | **string** | Название преобразователя |


**Return Value:**

Класс преобразователя



***

### parseStringArguments

Разобрать аргументы из строки

```php
protected parseStringArguments(string $arguments): array
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$arguments` | **string** | Аргументы |




***

### parseCast

Обработать переданный преобразователь

```php
protected parseCast(string|array $cast): array
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$cast` | **string&#124;array** |  |




***

### cast

Выполнить преобразования

```php
public cast(array $data): array
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$data` | **array** | Данные |




***


***
> Automatically generated from source code comments on 2023-10-27 using [phpDocumentor](http://www.phpdoc.org/) and [saggre/phpdocumentor-markdown](https://github.com/Saggre/phpDocumentor-markdown)
