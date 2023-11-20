***

# Cast

Основной класс для работы
с преобразователями

PHP version 8
* Full name: `\Whatis\PhpCast\Cast`

**See Also:**

* https://github.com/TheWhatis/PhpCast - 



## Properties


### casts

Массив с ключами и правилами
преобразования

```php
protected array $casts
```






***

### declared

Объявленные преобразователи

```php
protected static ?array $declared
```



* This property is **static**.


***

### declaredCasts

Объявленные преобразователи

```php
protected array $declaredCasts
```






***

## Methods


### __construct

Иницилизация класса

```php
public __construct(array $casts = []): mixed
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$casts` | **array** | Правила преобразования |




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

### getCasts

Получить список преобразователей

```php
public getCasts(): array
```











***

### add

Добавить новый объявленный
преобразователь

```php
public static add(string $cast): void
```



* This method is **static**.




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$cast` | **string** | Класс преобразователя |




***

### init

Самому иницилизировать объект
и передать в него объявленные
преобразователи

```php
public static init(array&lt;int,string&gt; $casts): void
```

Если это сделать, то теперь, при
каждом вызове метод cast преобразователи
не будут обновляться сами. Добавить
новый преобразователь можно
будет только методом [\Whatis\PhpCast\Cast::add()]()

* This method is **static**.




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$casts` | **array<int,string>** | Преобразователи |




***

### missedKeys

Получить пропущенные ключи в данных

```php
protected missedKeys(array $data, string|int $key): \Generator
```

Смотреть [\Whatis\PhpCast\Attributes\OnlyMissed]() и
[\Whatis\PhpCast\Attributes\WithMissed]()






**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$data` | **array** | Данные |
| `$key` | **string&#124;int** | Ключ |




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
| `$cast` | **string&#124;array** | Данные преобразователя |




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
> Automatically generated on 2023-11-20
