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

    /**
     * Get the line
     *
     * @return string
     */
    public function getLine()
    {
        return $this->line;
    }

    /**
     * Determine whether it is a tag
     *
     * @return boolean
     */
    public function isTag()
    {
        return \strpos($this->line, '@') === 0;
    }

    /**
     * Convert the object to a string
     *
     * @return string
     */
    public function __toString()
    {
        return $this->line;
    }

}

