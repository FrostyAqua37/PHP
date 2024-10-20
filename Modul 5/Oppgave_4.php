<?php

$array = [5, 3, 0, 3, 0, 5, 7, 7, 9, 10, 20]; // Added some more values to check if the code works as expected.

$frequency = array_count_values($array);

//Finds the values that only appears once and the key, and prints them both out.
foreach ($frequency as $value => $occurrences) {
    if($occurrences === 1) {
        //Finds the key
        $key = array_search($value, $array);
        echo "Element with the key of [" . $key . "] and value of (" . $value . ") appears only once in the array. <br>";
    }
}
