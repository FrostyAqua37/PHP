<?php
    function anagram ($word1, $word2) {
        $word1 = strtolower($word1);
        $word2 = strtolower($word2);
        if (count_chars($word1, 1) == count_chars($word2, 1)){
            echo $word1 . " is an anagram of " . $word2;
        } else {
            echo $word1 . " is not an anagram of " . $word2;
        }
    }

    echo(anagram("night", "THING") . "<br>");

?>