<?php

// ------------------Question 1------------------- //

/**
 * Turns an array into string, then list.
 * 
 * @param [$array] $intArray The array you want to turn into an HTML list.
 * @return void [$string] A list of numbers stringified.
 */
function turnArrayIntoList($intArray)
{
    implode($intArray);
    foreach ($intArray as $value) {
        echo "<li>$value</li>";
    }
}


// ------------------Question 2------------------- //

/**
 * Get only even values from an array.
 *
 * @param [$array] $intArray The array you want to get the even numbers from.
 * @return void [$number] The int values that are even.
 */
function getEvenValues($intArray)
{
    foreach ($intArray as $value) {
        if ($value % 2 === 0) {
            echo "<li>$value</li>";
        }
    }
}


// ------------------Question 3------------------- //

/**
 * Get the values of an array that are linked to an even index.
 *
 * @param [$array] $intArray An array only composed of int.
 * @return void [$int] Int with even indexes in an array.
 */
function getEvenIndexes($intArray)
{
    $i = 0;
    foreach ($intArray as $value[$i]) {
        if ($i % 2 == 0) {
            echo "<li>{$value[$i]}</li>";
        }
        $i++;
    }
}


// ------------------Question 4------------------- //

/**
 * Doubles every value from an int array.
 *
 * @param [$array] $intArray The array you want to double the values from.
 * @return void [$int] Each value doubled.
 */
function doublesArrayValues($intArray)
{
    $i = 0;
    foreach ($intArray as $value[$i]) {
        echo "<li>" . $value[$i] * 2 . "</li>";
        $i++;
    }
}
