<?php
    echo "<strong>Oppgave 3: Alderen til en person</strong><br>";

    $alder = 20;
    $navn = "Eivind Chen";

    echo " <table style=width:100%><strong>Tabell</strong>
                <tr>
                    <td>$navn</td>
                    <td>$alder</td>
                </tr>
            </table>";

    echo "  <ol><strong>Nummerert liste</strong>
                <li>Navn: {$navn}</li>
                <li>Alder: {$alder}</li>
            </ol>";

    echo "  <ul><strong>Punkt liste</strong>
            <li>Navn: $navn</li>
            <li>Alder: $alder</li>
            </ul>";

    echo "  <p><strong>Paragraf</strong><br>
                Navn: {$navn}<br>
                Alder: {$alder}<br>
            </p>";

?>

<title>Oppgave 3: Alderen til en person</title>
<style>
td {
  border:1px solid black;
}
</style>
