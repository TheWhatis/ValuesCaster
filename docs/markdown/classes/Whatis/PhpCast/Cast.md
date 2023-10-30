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
public array $casts
```






***

### declared

Объявленные преобразователи

```php
public static array $declared
```



* This property is **static**.


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

### add

Добавить новый объявленный
преобразователь

```php
public static add(string $cast): void
```

Они обязательно должны быть
наследуемые от интерфейса {@see \Whatis\PhpCast\ICast}
и любого из этих: {@see \Whatis\PhpCast\Standart},
{@see \Whatis\PhpCast\IsMissed},
{@see \Whatis\PhpCast\OnlyMissed}

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
будет только методом {@see \Whatis\PhpCast\Cast::add()}

* This method is **static**.




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$casts` | **array<int,string>** | Преобразователи |




***

### getDeclaredCasts

Получить все объявленные
преобразователи

```php
public static getDeclaredCasts(): array
```



* This method is **static**.







***

### isStandart

Проверить что переданный
преобразователь стандартный

```php
public static isStandart(object|string $cast): bool
```



* This method is **static**.




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$cast` | **object&#124;string** | Преобразователь |




***

### isMissed

Проверить что переданный
преобразователь принимает
пропущенные значения

```php
public static isMissed(object|string $cast): bool
```



* This method is **static**.




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$cast` | **object&#124;string** | Преобразователь |




***

### isOnlyMissed

Проверить что переданный
преобразователь принимает
только пропущенные значения

```php
public static isOnlyMissed(object|string $cast): bool
```



* This method is **static**.




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$cast` | **object&#124;string** | Преобразователь |




***

### isDataReference

Проверить что переданный
преобразователь принимает
ссылку на данные

```php
public static isDataReference(object|string $cast): bool
```



* This method is **static**.




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$cast` | **object&#124;string** | Преобразователь |




***

### isCasted

Проверить что преобразователь
имеет метод для преобразования
значений

```php
public static isCasted(object|string $cast): bool
```



* This method is **static**.




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$cast` | **object&#124;string** | Преобразователь |




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
> Automatically generated from source code comments on 2023-10-30 using [phpDocumentor](http://www.phpdoc.org/) and [saggre/phpdocumentor-markdown](https://github.com/Saggre/phpDocumentor-markdown)
