***

# ArrayTransformerContext

Контекст выполнения
преобразования `ArrayTransformer`

PHP version 8
* Full name: `\Whatis\ValuesCaster\Context\ArrayTransformerContext`
* Parent class: [`\Whatis\ValuesCaster\Context\BaseExecutionContext`](./BaseExecutionContext.md)

**See Also:**

* https://github.com/TheWhatis/ValuesCaster - 



## Properties


### missed

Свойство, в которой
хранится флаг, отвечающий
за определние, было ли
значение пропущено в
массиве

```php
protected bool $missed
```






***

### skip

Пропустить ли работу текущего преобразователя

```php
protected bool $skip
```






***

### key

Ключ, под которым
установлено это
значение

```php
protected string|int $key
```






***

### array

Данные в целом

```php
protected array $array
```






***

## Methods


### __construct

Иницилизация класса

```php
public __construct(\Whatis\ValuesCaster\Spells\ArrayTransformer $arrayTransformer, array $array, string|int $key, bool $missedFlag): mixed
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$arrayTransformer` | **\Whatis\ValuesCaster\Spells\ArrayTransformer** | Корневой объект |
| `$array` | **array** | Общий массив |
| `$key` | **string&#124;int** | Используемый ключ |
| `$missedFlag` | **bool** | Флаг о том, что<br />значение пропущено |




***

### missed

Установить флаг что значение
не было пропущено

```php
public missed(bool $flag): void
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$flag` | **bool** | Флаг |




***

### isMissed

Пропущено ли значение

```php
public isMissed(): bool
```











***

### shouldSkip

Пропустить ли преобразование значения

```php
public shouldSkip(): bool
```











***

### skip

Установить, что это преобразование
необходимо будет приостановить

```php
public skip(): void
```











***

### notSkip

Установить что это преобразование
не надо пропускать

```php
public notSkip(): void
```











***

### setKey

Изменить ключ

```php
public setKey(string|int $key): void
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$key` | **string&#124;int** | Ключ |




***

### getKey

Получить ключ

```php
public getKey(): string|int
```











***

### setArray

Установить общий массив

```php
public setArray(array $array): void
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** | Массив |




***

### set

Установить новое значение в общие данные

```php
public set(string|int $key, mixed $value): void
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$key` | **string&#124;int** | Ключ |
| `$value` | **mixed** | Значение |




***

### unset

Удалить значение из общих данных

```php
public unset(string|int $key): void
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$key` | **string&#124;int** | Ключ |




***

### getArray

Получить массив

```php
public getArray(): ?array
```











***


## Inherited methods


### setRoot

Установить корневой объект

```php
protected setRoot(\Whatis\ValuesCaster\ISpell $root): void
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$root` | **\Whatis\ValuesCaster\ISpell** |  |




***

### getRoot

Получить корневой объект, откуда
был вызван текущий преобразователь

```php
public getRoot(): \Whatis\ValuesCaster\ISpell
```











***


***
> Automatically generated on 2023-12-14
