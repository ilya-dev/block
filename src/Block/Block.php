<?php namespace Block;

class Block {

    /**
     * The object we work with.
     *
     * @var mixed
     */
    protected $object;

    /**
     * The Parser instance.
     *
     * @var Parser
     */
    protected $parser;

    /**
     * The constructor.
     *
     * @param mixed $object
     * @param Parser|null $parser
     * @return Block
     */
    public function __construct($object = null, Parser $parser = null)
    {
        if ( ! \is_null($object))
        {
            $this->setObject($object);
        }

        $this->parser = $parser ?: new Parser;
    }

    /**
     * Set the object you want to work with.
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
     * Fetch a property comment.
     *
     * @throws \UnexpectedValueException
     * @param string $name
     * @return Comment
     */
    public function property($name)
    {
        if ( ! $this->object->hasProperty($name))
        {
            $message = "Property {$name} does not exist";

            throw new \UnexpectedValueException($message);
        }

        return $this->extractComment($this->object->getProperty($name));
    }

    /**
     * Get the comments for all properties.
     *
     * @param integer|null $filter
     * @return array
     */
    public function properties($filter = null)
    {
        if (\is_null($filter))
        {
            $properties = $this->object->getProperties();
        }
        else
        {
            $properties = $this->object->getProperties($filter);
        }

        return \array_map([$this, 'extractComment'], $properties);
    }

    /**
     * Get the method comment.
     *
     * @throws \UnexpectedValueException
     * @param string $name
     * @return Comment
     */
    public function method($name)
    {
        if ( ! $this->object->hasMethod($name))
        {
            $message = "Method {$name} does not exist";

            throw new \UnexpectedValueException($message);
        }

        return $this->extractComment($this->object->getMethod($name));
    }

    /**
     * Get the comments for all methods.
     *
     * @param integer|null $filter
     * @return array
     */
    public function methods($filter = null)
    {
        if (\is_null($filter))
        {
            $methods = $this->object->getMethods();
        }
        else
        {
            $methods = $this->object->getMethods($filter);
        }

        return \array_map([$this, 'extractComment'], $methods);
    }

    /**
     * Extract the comment from the given Reflector instance.
     *
     * @param \Reflector $reflector
     * @return Comment
     */
    public function reflector(\Reflector $reflector)
    {
        return $this->extractComment($reflector);
    }

    /**
     * Extract the comment from the entity.
     *
     * @param \Reflector $entity
     * @return Comment
     */
    protected function extractComment(\Reflector $entity)
    {
        return new Comment($this->parser->transformRaw($entity->getDocComment()));
    }

}

