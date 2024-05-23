<?php

/**
 * Turns an array into string, then list.
 * 
 * @param [$array] $anyArray The array you want to turn into an HTML list.
 * @return void [$string] A list of numbers stringified.
 */
function turnArrayIntoList($anyArray)
{
    implode($anyArray);
    foreach ($anyArray as $value) {
        echo "<li>$value</li>";
    }
}

/**
 * Get only even values from an array.
 *
 * @param [$array] $anyArray The array you want to get the even numbers from.
 * @return void [$number] The int values that are even.
 */
function getEvenValues($anyArray)
{
    foreach ($anyArray as $value) {
        if ($value % 2 === 0) {
            echo "<li>$value</li>";
        }
    }
}
