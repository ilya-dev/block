# Block

*Block* makes parsing PHP DocBlocks easier.


Block requires `php >= 5.4.0` and works perfectly out-of-the-box.
Also it is fully tested and documented.

## Example

Imagine you have the following code:

```php
class Foo {

    /**
     * The bar
     *
     * @var integer
     */
    protected $bar;

    /**
     * The baz
     *
     * @var string
     */
    public $baz;

    /**
     * Do amaze
     *
     * @param string $amaze
     * @return void
     */
    private function wow($amaze)
    {

    }

}
```

First, instantiate Block, like so: `$block = new \Block\Block(new Foo);`


Now you can begin to inspect the docblocks using these four methods available to you.

+ `\Block\Comment property(string $name)`
+ `array properties(integer $filter)`
+ `\Block\Comment method(string $name)`
+ `array methods(integer $filter)`

Methods `property` and `method` will receive a name (as a string) and return an instance
of `\Block\Comment`. Methods `properties` and `methods` will receive an optional argument `$filter` 
and return an array of `\Block\Comment` instances.


If you are wondering what that `$filter` thing is, take a look at the example:

```php
$block->methods(\ReflectionMethod::IS_PUBLIC); // only fetch public methods

// only fetch private AND protected properties
$block->properties(\ReflectionProperty::IS_PRIVATE | \ReflectionProperty::IS_PROTECTED);
```


Ok, so now that you have an instance (or many of them) of `\Block\Comment`, 
what kind of actions can you perform?

+ convert the instance to a string: `$comment->getComment()`. `(string) $comment` would work too!
+ split it into lines: `$comment->getLines()`

Let's review the second option.

## License 

Block is licensed under the MIT license.
