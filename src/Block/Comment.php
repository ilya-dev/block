<?php namespace Block;

class Comment {

    /**
     * The comment itself
     *
     * @var string
     */
    protected $comment;

    /**
     * The constructor
     *
     * @param string $comment
     * @return void
     */
    public function __construct($comment)
    {
        $this->setComment($comment);
    }

    /**
     * Set the comment
     *
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

}

