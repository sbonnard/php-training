<?php

/**
 * Get from an array a HTML list string
 * @param array $array your array you want in HTML list
 * @param string $ulClass an optional CSS class to add to UL element
 * @param string $liClass an optional CSS class to add to LI elements
 * @return string the HTML list
 */
function getArrayAsHTMLList(array $array, string $ulClass = '', string $liClass = ''): string
{
    // $values = '';
    // foreach($array as $value){
    //     $values .= "<li>{$value}</li>";
    // }

    return '<ul class="' . $ulClass . '">' . implode(array_map(fn ($v) => '<li class="' . $liClass . '">' . $v . '</li>', $array)) . '</ul>';
}

/**
 * Get even values from an array.
 *
 * @param array $intArray The array you want the even values from.
 * @return array A new array only containing even values.
 */
function getEvenValues(array $intArray): array
{
    // foreach ($intArray as $value) {
    //     if (is_int($value) && $value % 2 === 0) {
    //         $intList[] = $value;
    //     }
    // }
    // return $intList;

    return array_filter($intArray, fn ($v) => is_int($v) && $v % 2 === 0);
}

/**
 * Get values with even index from array
 *
 * @param array $array The array you want the values from.
 * @return array A new array only containing even index.
 */
function getValueEvenIndex(array $array): array
{
    // $valuesInt = [];
    // foreach ($array as $key => $value) {
    //     if(is_int($key) && $key % 2 === 0 && is_int($value)) {
    //         $valuesInt[$key] = $value;
    //     }
    // }
    // return $valuesInt;
    return array_filter(
        $array,
        fn ($v, $k) => is_int($k) && $k % 2 === 0 && is_int($v),
        ARRAY_FILTER_USE_BOTH
    );
}

/**
 * Get array values and multiply by 2
 *
 * @param array $array the array you want to double values from
 * @return array new array with doubled values
 */
function doubleArrayValues(array $array): array
{
    $arrayResult = [];
    foreach ($array as $value) {
        if (is_int($value)) {
            $arrayResult[] = $value * 2;
        }
    }
    return $arrayResult;
}

/**
 * Get array values and divide by divider
 *
 * @param array $array the array you want to divide values from
 * @param int $divider the divider
 * @return array new array with divided values
 */
function divideArrayValues(array $array, int $divider = 2): array
{
    // $arrayResult = [];
    // foreach ($array as $value) {
    //     if (is_int($value)) {
    //         $arrayResult[] = $value / $divider;
    //     }
    // }
    // return $arrayResult;

    return array_map(
        fn ($v) => $v / $divider,
        array_filter($array, fn ($v) => is_int($v))
    );
}

/**
 * Excludes duplicates of an array
 *
 * @param array $array - array of integers or strings
 * @return array - array without duplicates
 */
function excludeDuplicates(array $array): array
{
    // return array_unique($array, SORT_REGULAR);
    $result = [];
    foreach ($array as $key => $value) {
        if (!in_array($value, $result)) {
            $result[$key] = $value;
        }
    }
    return $result;
}

/**
 * get intersection between two arrays.
 * @param array $array an array.
 * @param array $arrayA an array.
 * @return array the intersection array.
 */
function getIntersection(array $array, array $arrayA): array
{
    // return array_intersect($array, $arrayA);
    $result = [];
    foreach ($array as $key => $value) {
        if (in_array($value, $arrayA)) {
            $result[$key] = $value;
        }
    }
    return $result;
}

/**
 * Get values from the first array different from second array
 *
 * @param array $array1 the array you want the values from
 * @param array $array2 the array to compare
 * @param boolean $unique - if true, removes duplicates
 * @return array Array containing first array values that are different from the second one.
 */
function getArrayDiff(array $array1, array $array2, bool $unique = false): array
{
    // return array_diff($array1, $array2);

    $newArray = array_filter($array1, fn ($v) => !in_array($v, $array2));

    if ($unique) return excludeDuplicates($newArray);

    return $newArray;
}


/**
 * Get the first $nb values from the given array.
 *
 * @param array $array the array
 * @param integer $nb the number of values to extract
 * @return array an array with $nb values. Or the given array if $nb is bigger than the array length. 
 */
function getFirstElements(array $array, int $nb): array
{
    // return array_slice($array, 0, $nb, true);

    $newArray = [];
    // foreach ($array as $key => $value) {
    //     if (count($newArray) >= $nb) break;

    //     $newArray[$key] = $value;
    // }

    while (count($newArray) < $nb && count($array) > 0) {
        $newArray[] = array_shift($array);
    }

    return $newArray;
}


// --------------
// SERIES
// --------------

/**
 * get the platform from the series data.
 *
 * @param array $seriesData the array entry
 * @return array the list of platform
 */
function getPlatformsFromSeries(array $seriesData): array
{
    $platforms = [];

    foreach ($seriesData as $show) {
        $platforms[] = $show["availableOn"];
    }

    $platforms = excludeDuplicates($platforms);
    sort($platforms);

    return $platforms;
}


/**
 * Generate and return HTML code to display the show with the details in parameter.
 *
 * @param array $show An array containing show details
 * @param bool $full Display all show details if true, default false
 * @return string HTML code to display the show
 */
function generateShow(array $show, bool $full = false): string
{
    if ($full) {
        return '<div class="show">'
            . '<h3 class="show__ttl">' . $show['name'] . '</h3>'
            . '<img class="show__img" src="' . $show['image'] . '" alt="' . $show['name'] . '">'
            . '<div class="show__details">'
            . '<p>' . $show['country'] . ', ' . $show['launchYear'] . '</p>'
            . '<p>Disponible sur ' . $show['availableOn'] . '</p>'
            . '<p>Composée de ' . $show['numberOfEpisods'] . ' épisodes de ' . $show['episodeDurationInMinutes'] . ' minutes en ' . $show['numberOfSeasons'] . ' saisons.</p>'
            . '<p>' . ($show['ongoing'] ? 'Toujours en cours.' : 'Série terminée') . '</p>'
            . '<h4 class="show__sub-ttl">Styles</h4>'
            . getArrayAsHTMLList($show['styles'])
            . '<h4 class="show__sub-ttl">Acteurs</h4>'
            . getArrayAsHTMLList($show['actors'])
            . '<h4 class="show__sub-ttl">Equipe de création</h4>'
            . getArrayAsHTMLList($show['createdBy'])
            . '</div>'
            . '</div>';
    }

    return '<a href="?serie=' . $show['id'] . '#question4">'
        . '<h3 class="series__ttl">' . $show['name'] . '</h3>'
        . '<img class="series__img" src="' . $show['image'] . '" alt="' . $show['name'] . '">'
        . '</a>';
}


/**
 * Generate and return HTML code to display a series list.
 *
 * @param array $series An array that provides a list of series with all their details
 * @return string HTML code to display the list of series
 */
function generateSeries(array $series): string
{
    if (!isset($_GET['style'])) {
        return getArrayAsHTMLList(
            array_map("generateShow", $series),
            'series',
            'series__itm'
        );
    } else if (isset($_GET['style'])) {
        $filteredSeries = array_filter($series, fn ($show) => in_array($_GET['style'], $show['styles']));
        return getArrayAsHTMLList(
            array_map("generateShow", $filteredSeries),
            'series',
            'series__itm'
        );
    }
}

/**
 * Get show informations from its ID.
 *
 * @param array $dataSeries The array containing series data.
 * @param integer $id Show's ID you want the information of.
 * @return array|null Show informations or null if no ID found.
 */
function getShowInformationsFromId(array $dataSeries, int $id): ?array
{
    // foreach ($dataSeries as $show) {
    //     if ($show['id'] === $id) {
    //         return $show;
    //     }
    // }
    // return null;

    $result = array_filter($dataSeries, fn ($s) => $s['id'] === $id);

    if (count($result) !== 1) return null;

    return current($result);
}

/**
 * Get HTML code to display the show matching the id in the URL for the parameter 'serie'.
 *
 * @param array $series The array with all series data
 * @return string
 */
function generateSelectedShow(array $series): string
{
    // Is there a selected show?
    if (!isset($_GET['serie'])) {
        return '<p class="warning">Aucune série sélectionnée.</p>';
    }

    // Get show informations from the selected id in the URL
    $seriesData = getShowInformationsFromId($series, $_GET['serie']);

    // There is no match
    if (is_null($seriesData)) {
        return '<p class="error">La série sélectionnée n\'existe pas.</p>';
    }

    // Return HTML code to display the selected show.
    return  generateShow($seriesData, true);
}

/**
 * Get the list of all styles and count them in the given array
 * [
 *    "style" => 6,
 *    "style" => 2,
 *    "style" => 3
 * ]
 * @param array $series The array with all series data
 * @return array All the styles in alphabetic order
 */
function countStyles(array $series): array
{
    // $styles = [];
    // foreach ($series as $show) {
    //     //array_push($styles, ...$show['styles'] );
    //     $styles = array_merge($styles, $show['styles']);
    // }
    $styles = array_merge(...array_column($series, 'styles'));
    // $styles = excludeDuplicates($styles);
    $styles = array_count_values($styles);
    ksort($styles);
    return $styles;
}


/**
 * Get style label to display
 *
 * @param string $style Style name
 * @param integer $nb Number of series
 * @return string label to display the style
 */
function generateStyleLink(string $style, int $nb): string
{
    return '<a href="?style=' . urlencode($style) . '">' . $style . ' (' . $nb . ')</a>';
}


/**
 * Generate HTML code to display styles list from given series. 
 *
 * @param array $series The array with all series data.
 * @return string HTML code to display styles list.
 */
function generateStylesList(array $series): string
{

    $styles = countStyles($series);

    // $newArray = [];
    // foreach ($styles as $style => $nb) {
    //     $newArray[] = "{$style} ({$nb})";
    // }

    $newArray = array_map("generateStyleLink", array_keys($styles), array_values($styles));

    return getArrayAsHTMLList($newArray);
}




// function getShowInformationsFromStyle(array $dataSeries, string  $style): ?array
// {
//     $result = array_filter($dataSeries, fn ($s) => $s['style'] === $style);

//     if (count($result) !== 1) return null;

//     return current($result);
// }

// function generateStyleShow(array $series): string
// {
//     // Is there a selected show?
//     if (!isset($_GET['style'])) {
//         return '<p class="warning">Aucun style sélectionnée.</p>';
//     }

//     // Get show informations from the selected id in the URL
//     $seriesData = getShowInformationsFromStyle($series, $_GET['style']);

//     // There is no match
//     if (is_null($seriesData)) {
//         return '<p class="error">Le style sélectionnée n\'existe pas.</p>';
//     }

//     // Return HTML code to display the selected show.
//     return  generateShow($seriesData, true);
// }
