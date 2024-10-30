<title>Matrisematematikk</title>
<strong>Oppgave 5: Matrisematematikk</strong><br>

<?php 


$random_number_array = [];

for($i = 1;$i <= 9;$i++) {
    $random_number_array[] = rand(0, 100);
}
//$array = range(0, 100);
//$random_number_array = array_rand($array, 9);
$total = 0;

print_r($random_number_array);
echo "<br>";

foreach($random_number_array as $number) {
    echo $number . "<br>";
    $total += $number;
}   

$gjennomsnitt = number_format($total / count($random_number_array), 2);
$lowest = min($random_number_array);
$highest = max($random_number_array);

sort($random_number_array);
$middleIndex = count($random_number_array) / 2;
$median = ($random_number_array[$middleIndex]);

echo "<br>";
echo "Total: " . $total . "<br>";
echo "Gjennomsnitt: " . $gjennomsnitt . "<br>";
echo "Laveste tall: " . $lowest . "<br>";
echo "Høyeste tall: " . $highest . "<br>";
echo "Median: " . $median . "<br>";
?>

