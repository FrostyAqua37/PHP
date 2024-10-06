<title>Oppgave 3: Ny Saldo</title>
<strong>Oppgave 3: Ny Saldo</strong><br>

<?php
$saldo = 1000;
$rente = 5;
$antall_år = 7;

echo "Startsaldo: $saldo kr. <br>";
echo "Nåværende rente: $rente %. <br>";

$dato = date("d.m.y", strtotime("+1 year"));
$s1 = $saldo * (1 + $rente / 100);
echo "Etter 1 år ($dato) er saldoen: $s1 kr. <br><br>";

for($i = 1; $i <= $antall_år; $i++) {
    $saldo = $saldo * (1 + $rente / 100);
    $saldo = round($saldo, 2);
    $dato = date("d.m.y", strtotime("+$i year"));
    echo "Etter $i år ($dato) er saldoen: $saldo kr. <br>";
}

?>