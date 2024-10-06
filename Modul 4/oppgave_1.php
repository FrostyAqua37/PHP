<title>Skriv ut innholdet i en array</title>
<strong>Oppgave 1: Skriv ut innholdet i en array</strong><br>

<?php 
$numbers = [
    0 => 0, 
    3 => 3,
    5 => 5,
    7 => 7,
    8 => 8,
    15 => 15
];

Print_r($numbers);
echo "<br>";

foreach($numbers as $number) {
    echo array_keys($numbers, $number)[0] . " => " . $number . "<br>";
}

?>