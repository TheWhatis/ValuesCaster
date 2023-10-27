
***

# Documentation



This is an automatically generated documentation for **Documentation**.


## Namespaces


### \Whatis\PhpCast

#### Classes

| Class | Description |
|-------|-------------|
| [`BaseCast`](./classes/Whatis/PhpCast/BaseCast.md) | Абстрактный класс правила<br />преобразования, реализующий<br />основные методы для его работы|
| [`Cast`](./classes/Whatis/PhpCast/Cast.md) | Преобразовать в строку|


#### Traits

| Trait | Description |
|-------|-------------|
| [`TCast`](./classes/Whatis/PhpCast/TCast.md) | Трейт, реализующий<br />`ICast`|



#### Interfaces

| Interface | Description |
|-----------|-------------|
| [`ICast`](./classes/Whatis/PhpCast/ICast.md) | Интерфейс правила<br />преобразования|



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
| [`IsMissed`](./classes/Whatis/PhpCast/Traits/IsMissed.md) | Трейт реализующий статичный<br />метод `isMissed` в true,<br />обозначая, что возможны<br />передачи значений, которые<br />были пропущены|
| [`NonArgumentsParse`](./classes/Whatis/PhpCast/Traits/NonArgumentsParse.md) | Трейт, реализующий абстрактный<br />метод `parseArguments`<br />из `TCast`|
| [`NonMissed`](./classes/Whatis/PhpCast/Traits/NonMissed.md) | Трейт реализующий статичный<br />метод `isMissed` и `onlyMissed`<br />в false, обозначая, что не<br />возможны передачи значений, которые<br />были пропущены|
| [`OnlyMissed`](./classes/Whatis/PhpCast/Traits/OnlyMissed.md) | Трейт, который реализовывает<br />статичные методы для<br />преобразователей, которые<br />обозначают что в него<br />необходимо передавать<br />исключительно пропущенные<br />значения|




***
> Automatically generated from source code comments on 2023-10-27 using [phpDocumentor](http://www.phpdoc.org/) and [saggre/phpdocumentor-markdown](https://github.com/Saggre/phpDocumentor-markdown)
