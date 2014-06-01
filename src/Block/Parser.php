<?php namespace Block;

class Parser {

    /**
     * Prettify a raw comment.
     *
     * @param string $comment
     * @return string
     */
    public function transformRaw($comment)
    {
        $comment = preg_replace('/[\/\*]/', '', $comment);
        $chunks  = array_map('trim', explode(PHP_EOL, $comment));

        return implode(PHP_EOL, array_filter($chunks));
    }

}
