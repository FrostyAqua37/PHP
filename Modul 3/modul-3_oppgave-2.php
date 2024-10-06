<title>Teller med Pause</title>
<strong>Oppgave 2: Teller med Pause</strong><br>

<?php
$total = 0;
ob_end_flush();

for($i = 0;$i <= 9; $i++){
    echo $i . "<br>";
    sleep(1);
    flush();
    $total += $i;
}
sleep(2);
echo "Ferdig å  telle! Summen av tallene ble $total. ";

?>