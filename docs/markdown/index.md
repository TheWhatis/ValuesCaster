
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
| [`IsMissed`](./classes/Whatis/PhpCast/IsMissed.md) | Интерфейс для ICast,<br />позволяющий получать<br />пропущенные в данных<br />значения|
| [`OnlyMissed`](./classes/Whatis/PhpCast/OnlyMissed.md) | Интерфейс для `ICast`,<br />который ограничивает<br />получение данных до тех,<br />которые были пропущены|
| [`Standart`](./classes/Whatis/PhpCast/Standart.md) | Интерфейс, дополняющий<br />`ICast` для непосредтвенно<br />метода, который позволяет<br />преобразовывать значения|
| [`WithDataReference`](./classes/Whatis/PhpCast/WithDataReference.md) | Интерфейс, дополняющий<br />`ICast` для непосредтвенно<br />метода, который позволяет<br />преобразовывать значения|



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




### \Whatis\PhpCast\Traits



#### Traits

| Trait | Description |
|-------|-------------|
| [`NonArgumentsParse`](./classes/Whatis/PhpCast/Traits/NonArgumentsParse.md) | Трейт, реализующий абстрактный<br />метод `parseArguments`<br />из `TCast`|




***
> Automatically generated from source code comments on 2023-10-30 using [phpDocumentor](http://www.phpdoc.org/) and [saggre/phpdocumentor-markdown](https://github.com/Saggre/phpDocumentor-markdown)
