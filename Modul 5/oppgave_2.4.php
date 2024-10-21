<?php
class RoomsModel {
    private $conn;

    public function __construct() {
        // Kobler til database, skal bruke Include på denne for å koble til en annen fil med database koblingen.
        $host = 'localhost';
        $db = 'booking_db';
        $user = 'root';
        $pass = '';

        $this->conn = new mysqli($host, $user, $pass, $db);

        // skjekker koblingen
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    // Fetcher basert på filterene 
    public function getRooms($checkin = null, $checkout = null, $room_type = null) {
        $sql = "SELECT rooms.room_number, rooms.is_occupied, room_types.type_name 
                FROM rooms 
                JOIN room_types ON rooms.room_type_id = room_types.id
                WHERE 1=1";

        // Adder data filters
        if ($checkin && $checkout) {
            $sql .= " AND rooms.id NOT IN (
                        SELECT bookings.room_id 
                        FROM bookings 
                        WHERE (check_in <= '$checkout' AND check_out >= '$checkin')
                    )";
        }

        // Adder romm typer filter
        if ($room_type) {
            $sql .= " AND rooms.room_type_id = $room_type";
        }


        $result = $this->conn->query($sql);

        $rooms = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rooms[] = $row;
            }
        }

        return $rooms;
    }

    public function close() {
        $this->conn->close();
    }
}
?>
