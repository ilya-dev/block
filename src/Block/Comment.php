<?php namespace Block;

class Comment {

    /**
     * The comment itself
     *
     * @var string
     */
    protected $comment;

    /**
     * The Parser instance
     *
     * @var \Block\Parser
     */
    protected $parser;

    /**
     * The constructor
     *
     * @param string $comment
     * @param \Block\Parser|null $parser
     * @return void
     */
    public function __construct($comment, Parser $parser = null)
    {
        $this->setComment($comment);

        $this->parser = $parser ?: new Parser;
    }

    /**
     * Set the comment
     *
     * @throws \InvalidArgumentException
     * @param string $comment
     * @return void
     */
    public function setComment($comment)
    {
        if ( ! \is_string($comment))
        {
            $message = 'Expected to receive a string, but got'.\gettype($comment);

            throw new \InvalidArgumentException($message);
        }

        $this->comment = $comment;
    }

    /**
     * Represent the comment as an array of Line(s)
     *
     * @return array
     */
    public function getLines()
    {
        $lines = $this->parser->splitComment($this->comment);

        $wrapper = function($line)
        {
            return new Line($line);
        };

        return \array_map($wrapper, $lines);
    }

    /**
     * Get the comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Convert the object to a string
     *
     * @return string
     */
    public function __toString()
    {
        return $this->comment;
    }

}

