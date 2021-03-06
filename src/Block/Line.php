<?php namespace Block;

use InvalidArgumentException;

class Line {

    /**
     * The line.
     *
     * @var string
     */
    protected $line;

    /**
     * The constructor.
     *
     * @param string $line
     * @return Line
     */
    public function __construct($line)
    {
        $this->setLine($line);
    }

    /**
     * Set the line.
     *
     * @throws InvalidArgumentException
     * @param string $line
     * @return void
     */
    public function setLine($line)
    {
        if ( ! is_string($line))
        {
            throw new InvalidArgumentException(
                'Expected a string, but got '.gettype($line)
            );
        }

        $this->line = $line;
    }

    /**
     * Get the line.
     *
     * @return string
     */
    public function getLine()
    {
        return $this->line;
    }

    /**
     * Determine whether the line contains a @tag.
     *
     * @return boolean
     */
    public function isTag()
    {
        return strpos($this->line, '@') === 0;
    }

    /**
     * Strip the @tag.
     *
     * @return string
     */
    public function stripTag()
    {
        return trim(preg_replace('/@(\w+)/', '', $this->line, 1));
    }

    /**
     * Get the @tag name.
     *
     * @return string
     */
    public function getTag()
    {
        return str_replace('@', '', reset($this->tokenize()));
    }

    /**
     * Tokenize the line.
     *
     * @return array
     */
    public function tokenize()
    {
        return array_values(array_filter(explode(' ', $this->line)));
    }

    /**
     * Convert the object to a string.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->line;
    }

}
