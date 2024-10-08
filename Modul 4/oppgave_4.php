<title>Visning</title>
<strong>Oppgave 4: Visning</strong><br>

<?php
$roomtypes = [
    $singleroom = [
        "name" => "Single Room",
        "space" => 1,
        "price" => "1500 kr",
        "description" => "A room for one person."
    ],

    $doubleroom = [
        "name" => "Double Room",
        "space" => 2,
        "price" => "2200 kr",
        "description" => "A room for two people."
    ],

    $junior_suite = [
        "name" => "Junior Suite",
        "space" => 2,
        "price" => "2500 kr",
        "description" => "A room for two people with a living room."
    ]
];
?>


<table> 
    <?php 
    foreach($roomtypes as $types) {
        echo "<tr><td>" . "<strong>Roomtype: </strong>" . $types["name"] . "</td></tr>";
        echo "<tr><td>" . "<strong>Amount: </strong>" . $types["space"] . "</td></tr>";
        echo "<tr><td>" . "<strong>Price: </strong>" . $types["price"] . "</td></tr>";
        echo "<tr><td>" . "<strong>Description: </strong>" . $types["description"] . "</td></tr>";
    }

    ?>