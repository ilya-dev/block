<?php namespace Block;

class Block {

    /**
     * The object we work with
     *
     * @var mixed
     */
    protected $object;

    /**
     * The constructor
     *
     * @param mixed $object
     * @return void
     */
    public function __construct($object)
    {
        $this->setObject($object);
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
        $property = $this->object->getProperty($name);

        return new Comment($property->getDocComment());
    }

}

