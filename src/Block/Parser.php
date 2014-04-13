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
        $comment = \preg_replace('/[\/\*]/', '', $comment);

        $pieces = \array_map('\\trim', \explode(PHP_EOL, $comment));

        return \implode(PHP_EOL, \array_filter($pieces));
    }

}

