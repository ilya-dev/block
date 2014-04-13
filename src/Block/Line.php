<?php namespace Block;

class Line {

    /**
     * The line itself
     *
     * @var string
     */
    protected $line;

    /**
     * The constructor
     *
     * @param string $line
     * @return void
     */
    public function __construct($line)
    {
        $this->setLine($line);
    }

    /**
     * Set the line
     *
     * @param string $line
     * @return void
     */
    public function setLine($line)
    {
        if ( ! \is_string($line))
        {
            $message = 'Expected to receive a string, but got '.\gettype($line);

            throw new \InvalidArgumentException($message);
        }

        $this->line = $line;
    }

}

