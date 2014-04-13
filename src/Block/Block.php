<?php namespace Block;

class Block {

    /**
     * The object we work with
     *
     * @var mixed
     */
    protected $object;

    /**
     * The Parser instance
     *
     * @var \Block\Parser
     */
    protected $parser;

    /**
     * The constructor
     *
     * @param mixed $object
     * @param \Block\Parser|null $parser
     * @return void
     */
    public function __construct($object, Parser $parser = null)
    {
        $this->setObject($object);

        $this->parser = $parser ?: new Parser;
    }

    /**
     * Set the object you want to work with
     *
     * @throws \InvalidArgumentException
     * @param mixed $object
     * @return void
     */
    public function setObject($object)
    {
        if ( ! \is_object($object))
        {
            $message = 'Expected to receive an object, but got '.\gettype($object);

            throw new \InvalidArgumentException($message);
        }

        $this->object = new \ReflectionClass($object);
    }

    /**
     * Fetch the comment for the given property
     *
     * @param string $name
     * @return \Block\Comment
     */
    public function property($name)
    {
        if ( ! $this->object->hasProperty($name))
        {
            $message = "Property {$name} does not exist";

            throw new \UnexpectedValueException($message);
        }

        $comment = $this->object->getProperty($name)->getDocComment();

        return new Comment($this->parser->transformRaw($comment));
    }

}

