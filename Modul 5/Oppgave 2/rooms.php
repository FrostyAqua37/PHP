<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rooms</title>
    <script defer src="activePage.js"></script>
    <style>
        .room {
            width: 100px;
            height: 100px;
            display: inline-block;
            margin: 10px;
            text-align: center;
            line-height: 100px;
            font-size: 18px;
            border-radius: 10px;
            color: white;
            cursor: pointer;
        }
        .occupied {
            background-color: red;
        }
        .available {
            background-color: green;
        }
        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.4);
            justify-content: center;
            align-items: center;
        }
        .modal-content {
            background-color: black;
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            color: white;
        }
        .close {
            float: right;
            cursor: pointer;
            font-size: 24px;
            color: white;
        }
    </style>
</head>
<body>
<?php include_once "header.inc.php";?>
    <!-- Search Form Section -->
    <section id="search-section" class="search">
        <div class="search-container">
            <h2>Find a Room</h2>
            <form action="roomsView.php" method="GET">
                <label for="check-in">Check-in Date:</label>
                <input type="date" id="check-in" name="checkin" required>

                <label for="check-out">Check-out Date:</label>
                <input type="date" id="check-out" name="checkout" required>

                <label for="room">Room Type</label>
                <select id="room" name="room" required>
                    <option value="1">Single Room</option>
                    <option value="2">Double Room</option>
                    <option value="3">Junior Suite</option>
                </select>

                <label for="guests">Guests:</label>
                <select id="guests" name="guests" required>
                    <option value="1">1 Guest</option>
                    <option value="2">2 Guests</option>
                    <option value="3">3 Guests</option>
                    <option value="4">4 Guests</option>
                    <option value="5">5+ Guests</option>
                </select>

                <input type="submit" value="Search">
            </form>
        </div>
    </section>

    <?php
    // Include the controller to fetch the rooms
    include_once "../Controller/RoomsController.php";

    echo "<h1>Room Map</h1>";
    echo "<div id='room-container'>";

    if (!empty($rooms)) {
        foreach ($rooms as $row) {
            $class = $row['is_occupied'] ? 'occupied' : 'available';
            echo "<div class='room $class' data-room-number='" . $row['room_number'] . "' data-room-type='" . $row['type_name'] . "' data-occupied='" . $row['is_occupied'] . "'>Room " . $row['room_number'] . "</div>";
        }
    } else {
        echo "No rooms available.";
    }

    echo "</div>";
    ?>

    <div id="room-modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Room Details</h2>
            <p><strong>Room Number:</strong> <span id="modal-room-number"></span></p>
            <p><strong>Room Type:</strong> <span id="modal-room-type"></span></p>
            <p><strong>Status:</strong> <span id="modal-room-status"></span></p>
        </div>
    </div>

    <script>
        var modal = document.getElementById("room-modal");

        var closeModal = document.getElementsByClassName("close")[0];

        var rooms = document.querySelectorAll(".room");
        rooms.forEach(room => {
            room.addEventListener("click", function() {
                var roomNumber = this.getAttribute("data-room-number");
                var roomType = this.getAttribute("data-room-type");
                var isOccupied = this.getAttribute("data-occupied") == 1 ? "Occupied" : "Available";

                document.getElementById("modal-room-number").innerText = roomNumber;
                document.getElementById("modal-room-type").innerText = roomType;
                document.getElementById("modal-room-status").innerText = isOccupied;

                modal.style.display = "flex";
            });
        });

        closeModal.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
    <?php include_once "footer.inc.php"; ?>
</body>
</html>
