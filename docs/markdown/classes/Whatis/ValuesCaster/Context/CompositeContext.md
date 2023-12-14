***

# CompositeContext

Контекст выполнения
преобразования `Composite`

PHP version 8
* Full name: `\Whatis\ValuesCaster\Context\CompositeContext`
* Parent class: [`\Whatis\ValuesCaster\Context\BaseExecutionContext`](./BaseExecutionContext.md)

**See Also:**

* https://github.com/TheWhatis/ValuesCaster - 



## Properties


### break

Свойство, в которой хранится
флаг, отвечающий за определине,
нужно ли прекратить перебор
преоразователей

```php
protected bool $break
```






***

### skip

Свойство, в котором хранится
флаг, отвечающий за определение,
нужно ли пропустить текущее
преобразование в ходе работы
компновщика

```php
protected bool $skip
```






***

### cancel

Свойство, в котором хранится
флаг, отвечающий за определение,
нужно ли отменить все изменения
при работе компоновщика

```php
protected bool $cancel
```






***

## Methods


### __construct

Иницилизация класса

```php
public __construct(\Whatis\ValuesCaster\Spells\Composite $composite): mixed
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$composite` | **\Whatis\ValuesCaster\Spells\Composite** | компоновщик |




***

### break

Приостановить перебор преобразователей

```php
public break(): void
```











***

### notBreak

Восстановить перебор преобразователей

```php
public notBreak(): void
```











***

### skip

Установить, что преобразования,
произведенные в компоновщике,
должны быть пропущены

```php
public skip(bool $break = false): void
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$break` | **bool** | Остановить ли работу компноновщика |




***

### notSkip

Установить, что преобразования
произведенные в компоновщике,
не надо пропускать

```php
public notSkip(): void
```











***

### cancel

Отменить изменения

```php
public cancel(): void
```











***

### notCancel

Не отменять изменения

```php
public notCancel(): void
```











***

### shouldBreak

Приостановить ли перебор преобразователей

```php
public shouldBreak(): bool
```











***

### shouldSkip

Пропустить ли преобразователь

```php
public shouldSkip(): bool
```











***

### shouldCancel

Отменить ли изменения

```php
public shouldCancel(): bool
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
