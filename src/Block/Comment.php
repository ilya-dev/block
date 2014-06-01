<?php namespace Block;

use InvalidArgumentException;

class Comment {

    /**
     * The comment.
     *
     * @var string
     */
    protected $comment;

    /**
     * The constructor.
     *
     * @param string $comment
     * @return Comment
     */
    public function __construct($comment)
    {
        $this->setComment($comment);
    }

    /**
     * Set the comment.
     *
     * @throws InvalidArgumentException
     * @param string $comment
     * @return void
     */
    public function setComment($comment)
    {
        if ( ! is_string($comment))
        {
            throw new InvalidArgumentException(
                'Expected a string, but got '.gettype($comment)
            );
        }

        $this->comment = $comment;
    }

    /**
     * Represent the comment as an array of Line instances.
     *
     * @return array
     */
    public function getLines()
    {
        $lines = explode(PHP_EOL, $this->comment);

        $wrapper = function($line)
        {
            return new Line($line);
        };

        return array_map($wrapper, $lines);
    }

    /**
     * Get the comment.
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Convert the object to a string.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->comment;
    }

}
