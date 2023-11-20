***

# ICast

Интерфейс правила
преобразования

Чтобы передавались значения, которые
были пропущены, вы можете установить
атрибут [\Whatis\PhpCast\Attributes\WithMissed]()
на ваш класс

Если передан `WithMissed`, то дополнительно
в метод будет передается `bool` значение
`$miss`, в котором `false` - если передано
не пропущенное значение и `true` если
пропущенное

Либо если вам в преобразователе нужно
получать исключительно пропущенные
значения, используйте атрибут
[\Whatis\PhpCast\Attributes\OnlyMissed]()
на вашем классе

В таком случае в `$value` будет передаваться
всегда `null`

PHP version 8
* Full name: `\Whatis\PhpCast\ICast`


**See Also:**

* https://github.com/TheWhatis/PhpCast - 



## Methods


### __construct

Иницилизация правила

```php
public __construct(array $arguments = []): mixed
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$arguments` | **array** | Аргументы для него |




***

### getName

Получить название преобразования

```php
public static getName(): array|string
```



* This method is **static**.





**Return Value:**

$name Название преобразования



***

### cast

Применить преобразование

```php
public cast(mixed $value): mixed
```

Чтобы передавались значения, которые
были пропущены, вы можете установить
атрибут [\Whatis\PhpCast\Attributes\WithMissed]()
на ваш класс

Если передан `WithMissed`, то дополнительно
в метод будет передается `bool` значение
`$miss`, в котором `false` - если передано
не пропущенное значение и `true` если
пропущенное

Либо если вам в преобразователе нужно
получать исключительно пропущенные
значения, используйте атрибут
[\Whatis\PhpCast\Attributes\OnlyMissed]()
на вашем классе

В таком случае в `$value` будет передаваться
всегда null






**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$value` | **mixed** | Значение |




***


***
> Automatically generated on 2023-11-20
