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

        $this->object = $object;
    }

}

