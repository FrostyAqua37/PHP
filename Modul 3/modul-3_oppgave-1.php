<title>Datosjekk</title>
<strong>Oppgave 1: Datosjekk</strong><br>

<?php
    $date1 = date("d/m/y");
    $date2 = "22/09/24";

    if ($date1 < $date2) {
        echo $date1 . " har ikke skjedd ennå. <br>";
    } else {
        echo $date2 . " har skjedd. <br>";
    }
?>
