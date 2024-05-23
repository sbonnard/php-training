<?php

/**
 * Turns an array into string, then list.
 * @param [array] $anyArray Th earray you want to turn into an HTML list.
 * @return void
 */
function turnArrayIntoList($anyArray)
{
    implode($anyArray);
    foreach ($anyArray as $value) {
        echo "<li>$value</li>";
    }
}
