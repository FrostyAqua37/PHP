<?php
    function anagram ($word1, $word2) {
        $word1 = strtolower(trim($word1));
        $word2 = strtolower(trim($word2));
        //Finds and matches the amount of each letter in both variables 
        if (count_chars($word1, 1) == count_chars($word2, 1)){
            echo $word1 . " is an anagram of " . $word2 . ".";
        } else {
            echo $word1 . " is not an anagram of " . $word2 . ".";
        }
    }

    echo(anagram("night", "Thing") . "<br>");
    echo(anagram("Sun", "Moon") . "<br>");

    
?>