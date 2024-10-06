<title>Sjekk av fylkestilhørighet</title>
<strong>Oppgave 4: Sjekk av fylketilhørighet</strong><br>
<?php
$kommune = "Kristiansand ";

$return = match($kommune) {
    'Kristiansand' => $kommune . " ligger i Agder fylke.",  
    'Lillesand' => $kommune . " ligger i Agder fylke.",
    'Birkenes' => $kommune . " ligger i Agder fylke.",
    'Harstad' => $kommue  . " ligger i Troms fylke.",
    'Kvæfjord' => $kommune . " ligger i Troms fylke.",
    'Tromsø' => $kommune . " ligger i Troms fylke.",
    'Bergen' => $kommune . " ligger i Vestland fylke.",
    'Trondheim' => $kommune . " ligger i Trøndeland fylke.",
    'Bodø' => $kommune . " ligger i Nordland fylke.",
    'Alta' => $kommune . " ligger i Finnmark fylke.",
    default => $kommune . " ligger ikke i listen."
};

echo $return; 
?>