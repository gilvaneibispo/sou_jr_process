<?php

function printFig(array $fig): void
{
    foreach ($fig as $line) {

        foreach ($line as $char) {
            echo $char;
        }

        echo PHP_EOL;
    }
}
