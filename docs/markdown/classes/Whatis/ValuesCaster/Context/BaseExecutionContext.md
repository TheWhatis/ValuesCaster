***

# BaseExecutionContext

Интерфейс вспомогательного
класса с контекстом

PHP version 8
* Full name: `\Whatis\ValuesCaster\Context\BaseExecutionContext`
* This class implements:
[`\Whatis\ValuesCaster\Context\IExecutionContext`](./IExecutionContext.md)

**See Also:**

* https://github.com/TheWhatis/ValuesCaster - 



## Properties


### root

Корневой объект

```php
protected \Whatis\ValuesCaster\ISpell $root
```






***

## Methods


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
