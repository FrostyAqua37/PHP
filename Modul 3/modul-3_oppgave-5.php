<title>Sjakk og Hvete</title>
<strong>Sjakk og Hvete</strong><br>

<?php
$corn = 1;
$weight = 0.035;

for($i = 1; $i <= 64; $i++) {
  $total = number_format($corn, 0, ".", ".");
  echo "Rute $i har $total antall korn. <br>";
 
  $corn *= 2;
}
echo "<br> Sjakkbrettet har i totalt ". number_format($corn, 0) . " antall korn. <br>";

$total_weight = $corn * $weight;
echo number_format($total_weight, 0, ",", ".") . " gram hvete. <br>";
$tons = $total_weight / 1000000;
echo number_format($tons, 2, ",", ".") . " tonn hvete. <br>";
?>