<?php

function shortenText($string, $repl, $limit)
{
    if (strlen($string) > $limit) {
        return substr($string, 0, $limit) . $repl;
    } else {
        return $string;
    }
}