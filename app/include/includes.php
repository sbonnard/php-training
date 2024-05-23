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


// ------------------Question 4bis ------------------- //

/**
 * Divides every value from an array (int).
 *
 * @param array $intArray The array you want the values to be divided.
 * @param integer $divider The int that will divide each value. If not given, divider = 2.
 * @return void The values divided by your divider.
 */
function divideArrayValues(array $intArray, int $divider = 2)
{
    $i = 0;
    foreach ($intArray as $value[$i]) {
        echo "<li>" . $value[$i] / $divider . "</li>";
        $i++;
    }
}


// ------------------Question 5 ------------------- //

/**
 * Deletes similar values from an array whatever their type.
 *
 * @param array $anyArray The array you want to sort the doubles from.
 * @return void sorted array without doubled values.
 */
function deleteDoubles(array $anyArray)
{
    $anyArray = array_unique($anyArray);
    $anyArray = array_values($anyArray);
    return $anyArray;
}


// ------------------Question 6 ------------------- //

/**
 * Compares two arrays and gives the similar values between both.
 *
 * @param array $anyArrayA First array to compare.
 * @param array $anyArrayB Second array tr compare.
 * @return void $newArray A new array that contains every values that are similar.
 */
function getIntersection(array $anyArrayA, array $anyArrayB)
{
    $intersection = array_intersect($anyArrayA, $anyArrayB);
    return $intersection;
}


// ------------------Question 7 ------------------- //

/**
 * Compares two arrays and gives the different values between both.
 *
 * @param array $anyArrayA First array to compare.
 * @param array $anyArrayB Second array tr compare.
 * @return void $newArray A new array that contains every values that are different.
 */
function getDifferences(array $anyArrayA, array $anyArrayB)
{
    $differences = array_diff($anyArrayA, $anyArrayB);
    return $differences;
}


// ------------------Question 8 ------------------- //

/**
 * Compare both array and sorts the doubles.
 *
 * @param array $anyArrayA The first array to compare.
 * @param array $anyArrayB The second array ton compare
 * @param boolean $unique If true, sorts the new array to unset doubles.
 * @return void $array that contains no doubles.
 */
function getDifferencesAndSort(array $anyArrayA, array $anyArrayB, bool $unique = true)
{
    $differences = array_diff($anyArrayA, $anyArrayB);
    if ($unique) {
        $differences = array_unique($differences);
    }
    return $differences;
}


// ------------------Question 9 ------------------- //

/**
 * Exracts as many elements you want from an array.
 *
 * @param array $anyArray The array you want to slice the elements from.
 * @param integer $intNumber The amount of values you want to slice from the array.
 * @return void [array] The array after being sliced.
 */
function getFirstElements(array $anyArray, int $intNumber)
{
    $result = array_slice($anyArray, 0, $intNumber);
    return $result;
}
