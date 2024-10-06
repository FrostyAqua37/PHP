<title>Matrisematematikk</title>
<strong>Oppgave 5: Matrisematematikk</strong><br>

<?php 

$array = range(0, 100);
$random_number_array = array_rand($array, 9);
$total = 0;

print_r($random_number_array);
sort($random_number_array);
echo "<br>";

foreach($random_number_array as $number) {
    echo $number . "<br>";
    $total += $number;
}   

$gjennomsnitt = number_format($total / count($random_number_array), 2);
$lowest = min($random_number_array);
$highest = max($random_number_array);

echo "Total: " . $total . "<br>";
echo "Gjennomsnitt: " . $gjennomsnitt . "<br>";
echo "Laveste tall: " . $lowest . "<br>";
echo "Høyeste tall: " . $highest . "<br>";
echo "Sortert rekkefølge: " . "<br>";

?>

