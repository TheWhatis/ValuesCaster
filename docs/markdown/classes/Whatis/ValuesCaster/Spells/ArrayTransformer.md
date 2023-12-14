***

# ArrayTransformer

Преобразователь для
детализированного преобразования
массивов за счёт использования
других преобразователей

PHP version 8
* Full name: `\Whatis\ValuesCaster\Spells\ArrayTransformer`
* This class implements:
[`\Whatis\ValuesCaster\ISpell`](../ISpell.md)

**See Also:**

* https://github.com/TheWhatis/ValuesCaster - 



## Properties


### spells

Массив с ключами и правилами
преобразования

```php
protected array $spells
```






***

## Methods


### __construct

Иницилизация класса

```php
public __construct(array $arguments = []): mixed
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$arguments` | **array** | Список преобразователей |




***

### setAll

Установить новые преобразования

```php
public setAll(array&lt;string|int,\Whatis\ValuesCaster\ISpell&gt; $spells): void
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$spells` | **array<string&#124;int,\Whatis\ValuesCaster\ISpell>** | Преобразователи |




***

### set

Добавить преобразователь

```php
public set(string|int $key, \Whatis\ValuesCaster\ISpell $spell): void
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$key` | **string&#124;int** | Ключ в массиве |
| `$spell` | **\Whatis\ValuesCaster\ISpell** | Преобразователь |




***

### getSpells

Получить список преобразователей

```php
public getSpells(): array
```











***

### missedKeys

Получить пропущенные ключи в данных

```php
protected missedKeys(array $array, string|int $key): \Generator
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** | Массив |
| `$key` | **string&#124;int** | Ключ |




***

### castUnit

Запустить один единственный преобразователь

```php
protected castUnit(array $array, mixed $value, string|int $key, \Whatis\ValuesCaster\ISpell $spell, \Whatis\ValuesCaster\Context\ArrayTransformerContext $context): array
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** | Общие данные |
| `$value` | **mixed** | Текущее значение |
| `$key` | **string&#124;int** | Текущий ключ |
| `$spell` | **\Whatis\ValuesCaster\ISpell** | Преобразователь |
| `$context` | **\Whatis\ValuesCaster\Context\ArrayTransformerContext** | Вспомогательный объект преобраз-ля |


**Return Value:**

Преобразованный массив



***

### cast

Выполнить преобразования массива

```php
public cast(mixed $value): mixed
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$value` | **mixed** | Значение (работаем только с массивами) |




***


***
> Automatically generated on 2023-12-14
