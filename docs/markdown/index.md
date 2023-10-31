
***

# Documentation



This is an automatically generated documentation for **Documentation**.


## Namespaces


### \Whatis\PhpCast

#### Classes

| Class | Description |
|-------|-------------|
| [`BaseCast`](./classes/Whatis/PhpCast/BaseCast.md) | Абстрактный класс правила<br />преобразования, реализующий<br />основные методы для его работы|
| [`Cast`](./classes/Whatis/PhpCast/Cast.md) | Основной класс для работы<br />с преобразователями|


#### Traits

| Trait | Description |
|-------|-------------|
| [`TCast`](./classes/Whatis/PhpCast/TCast.md) | Трейт, реализующий<br />`ICast`|



#### Interfaces

| Interface | Description |
|-----------|-------------|
| [`ICast`](./classes/Whatis/PhpCast/ICast.md) | Интерфейс правила<br />преобразования|
| [`WithDataReference`](./classes/Whatis/PhpCast/WithDataReference.md) | Интерфейс, дополняющий<br />`ICast` для непосредтвенно<br />метода, который позволяет<br />преобразовывать значения|



### \Whatis\PhpCast\Attributes

#### Classes

| Class | Description |
|-------|-------------|
| [`OnlyMissed`](./classes/Whatis/PhpCast/Attributes/OnlyMissed.md) | Класс атрибута-флага<br />обозначающий, что<br />в преобразователь<br />нужно передавать только<br />пропущенные значения|
| [`WithMissed`](./classes/Whatis/PhpCast/Attributes/WithMissed.md) | Класс атрибута-флага<br />обозначающий, что<br />в преобразователь<br />нужно передавать ещё и<br />пропущенные значения|




### \Whatis\PhpCast\Casts

#### Classes

| Class | Description |
|-------|-------------|
| [`Arr`](./classes/Whatis/PhpCast/Casts/Arr.md) | Преобразовать в массив|
| [`Boolean`](./classes/Whatis/PhpCast/Casts/Boolean.md) | Преобразовать в bool|
| [`ByDefault`](./classes/Whatis/PhpCast/Casts/ByDefault.md) | Класс преобразователя<br />который позвояет<br />установить значение<br />по-умолчанию|
| [`Integer`](./classes/Whatis/PhpCast/Casts/Integer.md) | Преобразовать в int|
| [`Integer`](./classes/Whatis/PhpCast/Casts/Integer.md) | Преобразовать в object|
| [`Str`](./classes/Whatis/PhpCast/Casts/Str.md) | Преобразовать в строку|




***
> Automatically generated from source code comments on 2023-10-31 using [phpDocumentor](http://www.phpdoc.org/) and [saggre/phpdocumentor-markdown](https://github.com/Saggre/phpDocumentor-markdown)
