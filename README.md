# Block

*Block* makes parsing PHP DocBlocks easier.


Block requires `php >= 5.4.0` and works perfectly out-of-the-box.
Also it is fully tested and documented.

## Installation

Grab it using Composer: `composer require ilya/block:dev-master`.


Prefer a tagged release? Use `1.0.1`, `1.0.0`. I use semantic versioning in my projects, 
so you can safely use `~1`, trust me.

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

First, instantiate Block, like so: `$block = new \Block\Block(new Foo);`.


Now you can begin to inspect the docblocks using these four methods available to you.

+ `\Block\Comment property(string $name)`
+ `array properties(integer $filter)`
+ `\Block\Comment method(string $name)`
+ `array methods(integer $filter)`
+ `\Block\Comment reflector(\Reflector $reflector)` **(NEW!)**

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

+ convert the instance to a string: `$comment->getComment()`. Note that `(string) $comment` would work too!
+ split it into lines: `$comment->getLines()`.

Let's review the second option.


Calling the `getLines()` method will return an array, each element of which is an instance of `\Block\Line`.


Here's what it offers:

+ `boolean isTag(void)` - determine whether the line contains a tag: will be true for `@param int $speed` and false for `My desc`. 
+ `string getLine(void)` - get the line itself, as a string, note that `(string) $line` would also work.
+ `array tokenize(void)` - split the line into "tokens" - e.g `@param int $speed` will be represented as `['@param', 'int', '$speed']`. All white spaces are ignored.

So that's it, hopefully you now can start to use Block in your projects.

## License 

Block is licensed under the MIT license.
