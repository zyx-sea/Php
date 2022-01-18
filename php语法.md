## php语法

### PHP global 关键字

global 关键字用于函数内访问全局变量。在函数内调用函数外定义的全局变量，我们需要在函数中的变量前加上 global 关键字：

PHP 将所有全局变量存储在一个名为 $GLOBALS[*index*] 的数组中。 *index* 保存变量的名称。这个数组可以在函数内部访问，也可以直接用来更新全局变量。

### Static 作用域

当一个函数完成时，它的所有变量通常都会被删除。然而，有时候您希望某个局部变量不要被删除。

要做到这一点，请在您第一次声明变量时使用 **static** 关键字：

## PHP EOF(heredoc) 使用说明

PHP EOF(heredoc)是一种在命令行shell（如sh、csh、ksh、bash、PowerShell和zsh）和程序语言（像Perl、PHP、Python和Ruby）里定义一个字符串的方法。

1.以 **<<<EOF** 开始标记开始，以 **EOF** 结束标记结束，结束标记必须顶头写，不能有缩进和空格，且在结束标记末尾要有分号 。

2.开始标记和结束标记相同，比如常用大写的 **EOT、EOD、EOF** 来表示，但是不只限于那几个(也可以用：JSON、HTML等)，只要保证开始标记和结束标记不在正文中出现即可。

3.位于开始标记和结束标记之间的变量可以被正常解析，但是函数则不可以。在 heredoc 中，变量不需要用连接符 **.** 或 **,** 来拼接

## PHP 输出函数（3种）

**1)echo**
可将紧跟其后的一个或多个字符串、表达式、变量和常量的值输出到页面中多个数据之间使用逗号","分隔。**2) print**
print与echo的用法相同，唯一的区别是print**只能输出一个值**。
**3）print_r()**
print_r()是PHP的内置函数，它可以输出任意类型的数据，如字符串、数组等。
**4）var_dump()**
var_dump()不仅可以**打印一个或多个任意类型的数据**，还可以**获取数据的类型和元素个数**。

## PHP 对象

对象数据类型也可以用于存储数据。

在 PHP 中，对象必须声明。

首先，你必须使用class关键字声明类对象。类是可以包含属性和方法的结构。

然后我们在类中定义数据类型，然后在实例化的类中使用数据类型：

```php
<?php
class Car
{
    var $color;
    function __construct($color="green") {
      $this->color = $color;
    }
    function what_color() {
      return $this->color;
    }
}
function print_vars($obj) {
   foreach (get_object_vars($obj) as $prop => $val) {
     echo "\t$prop = $val\n";
   }
}
// 实例一个对象
$herbie = new Car("white");
// 显示 herbie 属性
echo "\therbie: Properties\n";
print_vars($herbie);
?>  

```

## PHP 类型比较

- 松散比较：使用两个等号 **==** 比较，只比较值，不比较类型。
- 严格比较：用三个等号 **===** 比较，除了比较值，也比较类型。

## PHP 5 常量

```php
bool define ( string $name , mixed $value [, bool $case_insensitive = false ] )
```

该函数有三个参数:

- **name：**必选参数，常量名称，即标志符。

- **value：**必选参数，常量的值。

- **case_insensitive** ：可选参数，如果设置为 TRUE，该常量则大小写不敏感。默认是大小写敏感的。

## PHP 字符串变量

### PHP 并置运算符

在 PHP 中，只有一个字符串运算符。

并置运算符 (.) 用于把两个字符串值连接起来。

### PHP strlen() 函数

strlen() 函数返回字符串的长度（字节数）。

### PHP strpos() 函数

strpos() 函数用于在字符串内查找一个字符或一段指定的文本。

如果在字符串中找到匹配，该函数会返回第一个匹配的字符位置。如果未找到匹配，则返回 FALSE。

## PHP数组

### PHP 数值数组

这里有两种创建数值数组的方法：

自动分配 ID 键（ID 键总是从 0 开始）：

```php
$cars=array("Volvo","BMW","Toyota");
```

人工分配 ID 键：

```php
$cars[0]="Volvo";
$cars[1]="BMW";
$cars[2]="Toyota";
```

### 获取数组的长度 - count() 函数

### PHP 关联数组

关联数组是使用您分配给数组的指定的键的数组。

这里有两种创建关联数组的方法：

```php
$age=array("Peter"=>"35","Ben"=>"37","Joe"=>"43");
```

or:

```php
$age['Peter']="35";
$age['Ben']="37";
$age['Joe']="43";
```

## PHP数据排序

在本章中，我们将一一介绍下列 PHP 数组排序函数：

- sort() - 对数组进行升序排列

- rsort() - 对数组进行降序排列

- asort() - 根据关联数组的值，对数组进行升序排列

- ksort() - 根据关联数组的键，对数组进行升序排列

- arsort() - 根据关联数组的值，对数组进行降序排列

- krsort() - 根据关联数组的键，对数组进行降序排列

## foreach 循环

foreach 循环用于遍历数组。

## PHP 魔术常量

有八个魔术常量它们的值随着它们在代码中的位置改变而改变。

大多数是**文件信息相关**

## Mysql和SQL server通过php取数据后的一点异同

1. 本来为Int的数据，在Mysql里被php取出后传到js里后是Char类型，而SQLserver仍然是int。

> mysql(int) -> php -> js(char)
>  sqlserver(int) -> php -> js(int)

1. 如果有把date类型转换为时间戳的需求，在mysql里，可以通过查询语句直接更改（比如UNIX_TIMESTAMP(Starttime)）然后给php。   而在SQLserver里通过query取出来还是date，需要传到php后再进行转换（比如((strtotime($row['Starttime']) ）

> mysql(date) -> query(convert to timesteamp) -> php( timesteamp )
>  sqlserver (date) -> query(date)  -> php (convert to timesteamp)



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

git@gist.github.com:f0d7b1dd4a495c80ed7e27a67ec42a52.git

f0d7b1dd4a495c80ed7e27a67ec42a52

https://gist.github.com/f0d7b1dd4a495c80ed7e27a67ec42a52.git

#php 的 PHPExcel1.8.0 使用
https://www.cnblogs.com/makalochen/p/12834440.html

