***

# Composite

Компановщик для преобразователей

PHP version 8
* Full name: `\Whatis\ValuesCaster\Spells\Composite`
* This class implements:
[`\Whatis\ValuesCaster\ISpell`](../ISpell.md)

**See Also:**

* https://github.com/TheWhatis/ValuesCaster - 



## Properties


### spells

Преобразователи

```php
protected array&lt;int,\Whatis\ValuesCaster\ISpell&gt; $spells
```






***

## Methods


### __construct

Иницилизация преобразователя

```php
public __construct(array&lt;int,\Whatis\ValuesCaster\ISpell&gt; $spells): mixed
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$spells` | **array<int,\Whatis\ValuesCaster\ISpell>** | Преобразователи |




***

### setAll

Установить преобразователи

```php
public setAll(array&lt;int,\Whatis\ValuesCaster\ISpell&gt; $spells): void
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$spells` | **array<int,\Whatis\ValuesCaster\ISpell>** | Преобразователи |




***

### set

Установить преобразователь

```php
public set(int $index, \Whatis\ValuesCaster\ISpell $spell): void
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$index` | **int** | Индекс элемента |
| `$spell` | **\Whatis\ValuesCaster\ISpell** | Преобразователь |




***

### unset

Удалить преобразователь

```php
public unset(int $index): void
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$index` | **int** | Индекс элемента |




***

### add

Добавить новый преобразователь

```php
public add(\Whatis\ValuesCaster\ISpell $spell): void
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$spell` | **\Whatis\ValuesCaster\ISpell** | Преобразователь |




***

### getSpells

Получить переданные преобразователи

```php
public getSpells(): array&lt;int,\Whatis\ValuesCaster\ISpell&gt;
```











***

### getSupportsArguments

Получить массив с аргументами
для поддерживаемого преобразователя

```php
public static getSupportsArguments(\Whatis\ValuesCaster\ISpell $spell, \Whatis\ValuesCaster\Context\CompositeContext $context): array
```



* This method is **static**.




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$spell` | **\Whatis\ValuesCaster\ISpell** | Преобразователь |
| `$context` | **\Whatis\ValuesCaster\Context\CompositeContext** | Контекст |




***

### cast

Преобразовываем значения по-цепочке

```php
public cast(mixed $value): mixed
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$value` | **mixed** | Значение |




***


***
> Automatically generated on 2023-12-14
