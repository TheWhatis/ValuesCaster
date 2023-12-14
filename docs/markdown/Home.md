
***

# Documentation



This is an automatically generated documentation for **Documentation**.


## Namespaces


### \Whatis\ValuesCaster




#### Interfaces

| Interface | Description |
|-----------|-------------|
| [`ISpell`](./classes/Whatis/ValuesCaster/ISpell.md) | Интерфейс преобразователя|



### \Whatis\ValuesCaster\Attributes

#### Classes

| Class | Description |
|-------|-------------|
| [`ArrayTransformerContextual`](./classes/Whatis/ValuesCaster/Attributes/ArrayTransformerContextual.md) | Атрибут, отвечающий<br />за определение, что<br />преобразователь может<br />работать с контекстом<br />компновщика<br />`ArrayTransformer`|
| [`CompositeContextual`](./classes/Whatis/ValuesCaster/Attributes/CompositeContextual.md) | Атрибут, отвечающий<br />за определение, что<br />преобразователь может<br />работать с контекстом<br />компновщика<br />`Composite`|




### \Whatis\ValuesCaster\Context

#### Classes

| Class | Description |
|-------|-------------|
| [`ArrayTransformerContext`](./classes/Whatis/ValuesCaster/Context/ArrayTransformerContext.md) | Контекст выполнения<br />преобразования `ArrayTransformer`|
| [`BaseExecutionContext`](./classes/Whatis/ValuesCaster/Context/BaseExecutionContext.md) | Интерфейс вспомогательного<br />класса с контекстом|
| [`CompositeContext`](./classes/Whatis/ValuesCaster/Context/CompositeContext.md) | Контекст выполнения<br />преобразования `Composite`|



#### Interfaces

| Interface | Description |
|-----------|-------------|
| [`IExecutionContext`](./classes/Whatis/ValuesCaster/Context/IExecutionContext.md) | Интерфейс вспомогательного<br />класса с контекстом|



### \Whatis\ValuesCaster\Spells

#### Classes

| Class | Description |
|-------|-------------|
| [`Arr`](./classes/Whatis/ValuesCaster/Spells/Arr.md) | Преобразовать в массив|
| [`ArrayTransformer`](./classes/Whatis/ValuesCaster/Spells/ArrayTransformer.md) | Преобразователь для<br />детализированного преобразования<br />массивов за счёт использования<br />других преобразователей|
| [`Boolean`](./classes/Whatis/ValuesCaster/Spells/Boolean.md) | Преобразовать в bool|
| [`ByDefault`](./classes/Whatis/ValuesCaster/Spells/ByDefault.md) | Класс преобразователя<br />который позвояет<br />установить значение<br />по-умолчанию|
| [`Composite`](./classes/Whatis/ValuesCaster/Spells/Composite.md) | Компановщик для преобразователей|
| [`Integer`](./classes/Whatis/ValuesCaster/Spells/Integer.md) | Преобразовать в int|
| [`Obj`](./classes/Whatis/ValuesCaster/Spells/Obj.md) | Преобразовать в object|
| [`Str`](./classes/Whatis/ValuesCaster/Spells/Str.md) | Преобразовать в строку|




### \Whatis\ValuesCaster\Spells\Composite

#### Classes

| Class | Description |
|-------|-------------|
| [`CancelIf`](./classes/Whatis/ValuesCaster/Spells/Composite/CancelIf.md) | Преобразователь<br />для компановщика за счёт<br />которого можно полностью<br />отменить все изменения<br />если не было пройдено<br />условие|
| [`SkipIf`](./classes/Whatis/ValuesCaster/Spells/Composite/SkipIf.md) | Преобразователь<br />для компановщика за счёт<br />которого можно полностью<br />отменить все изменения<br />если не было пройдено<br />условие|




***
> Automatically generated on 2023-12-14
