<?php namespace Block;

class Parser {

    /**
     * Make the raw comment prettier
     *
     * @param string $comment
     * @return string
     */
    public function transformRaw($comment)
    {
        $comment = \str_replace(['/', '*'], '', $comment);

        $pieces = \array_map('\\trim', \explode(PHP_EOL, $comment));

        return \implode(PHP_EOL, \array_filter($pieces));
    }

    /**
     * Split the comment into pieces/lines
     *
     * @param string $comment
     * @return array
     */
    public function splitComment($comment)
    {
        return \explode(PHP_EOL, $comment);
    }

}

