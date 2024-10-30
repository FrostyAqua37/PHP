<?php 

//Oppgave 1
class User {
    public $firstName;
    public $surname;
    protected $username;
    public $dateOfBirth;
    protected $registrationDate;
    protected static $deletedUsers = array();

    public function __construct($registrationDate = "20.10.24") {
        $username = array_merge(range("a", "z"), range("A", "Z"), range(0, 9));
        shuffle($username);
        $username = substr(implode($username), 0, 10);
        return $username;
    } 

    //oppgave 3
    public function __destruct() {
        if(sizeof(self::$deletedUsers) < 2) {
            array_push(self::$deletedUsers, $this->username);
        } 
    }

    function getDeletedUsers() {
        foreach(self::$deletedUsers as $value) {
            echo $value . "<br>";
        }
    }

    function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    function setSurname($surname) {
        $this->surname = $surname;
    }

    function getFirstName() {
        return $this->firstName;
    }

    function getSurname() {
        return $this->surname;
    }

    function login() {
        return "You are now logged in as a Guest!";
    }
}

//Oppgave 2.
class Admin extends User {

    function login() {
        return "You are now logged in as an Admin! <br>";
    }

    //Oppgave 3
    function createGuest($firstName, $surname, $username, $registrationDate) {
        $this->firstName = $firstName;
        $this->surname = $surname;
        $this->username = $username;
        $this->registrationDate = $registrationDate;

        echo "Name: " . $this->firstName . "<br>";
        echo "Surname: " . $this->surname . "<br>";
        echo "Username: " . $this->username . "<br>";
        echo "Registration Date: " . $this->registrationDate . "<br>";
    }
}

//Oppgave 4 og 5
class Validation {
    protected $email;
    protected $password;
    protected $phoneNumber;

    function validateEmail($email) {
        if(empty(trim($email))) {
            //Check if email field is empty
            echo "Email is required!" . "<br>";
        } else if (!filter_var(trim($email), FILTER_VALIDATE_EMAIL)) {
            //Check if email is valid.
            echo "Email is not valid!" . "<br>";
        } else {
            //Stores email field into a session variabel
            $emailVerified = filter_var(trim($email, FILTER_SANITIZE_EMAIL));
            echo "Email is verified! <br>";
        }
    }

    function validatePassword($password) {
        $frequency = preg_match_all("/[0-9]/", $password); //Finds occurrences of numeric values

        if(empty(trim($password))) {
            //Checks if password is empty
            echo "Password cant be empty!";
        } else if(strlen($password) < 9) {
            //Checks if password has 9 characters
            echo "Password must be atleast 9 characters long. <br>";
        } else if(!preg_match("/[A-Z]/", $password)) {
            //Checks for capital letter
            echo "Password must contain atleast 1 capital letter. <br>";
        } else if(!preg_match("/[^\w]/", $password)) {
            //Checks for special characters
            echo "Password must contain atleast 1 special character. <br>";
        } else if($frequency < 2) {
            //Checks if password has 2 numbers
            echo "Password must contain atleast 2 numbers. <br>";
        } else {
            echo "Password is valid. <br>";
        }
    }

    function validatePhoneNumber($nor, $phoneNumber) {
        $phoneNumber = str_replace(" ", "", $phoneNumber); //Removes blank spaces
        $fullPhoneNumber = $nor . $phoneNumber; //Combines both variables

        if(empty(trim($fullPhoneNumber))) {
            //Checks if number is empty.
            echo "Phone Number cant be empty!";
        } else if(strlen($phoneNumber) < 8) {
            //Checks if number has 8 digits.
            echo "Phone number is too short";
        } else if(!preg_match("/^[+47]{3}[0-9]{8}$/", $fullPhoneNumber)) {
            //Checks if number is valid norwegian number.
            echo "Phone number is not a valid norwegian number. <br>";
        } else {
            echo "Phone number is a valid norwegian number. <br>";
        }
    }
}

echo "<strong>Modul 6</strong><br>";

echo "Oppgave 2: <br>";
$user = new User();
echo $user->login() . "<br>";

$admin = new Admin();
echo $admin->login() . "<br>";

echo "Oppgave 3: <br>";
$secondAdmin = new Admin();
$thirdAdmin = new Admin();

$secondAdmin->createGuest("Eivind", "Chen", $user->__construct(), "09.09.24");
echo "<br>";
$thirdAdmin->createGuest("Eric", "Charles", $user->__construct(), "19.10.24");
echo "<br>";

unset($secondAdmin);
unset($thirdAdmin);

echo "Deleted users: <br>";
echo $user->getDeletedUsers();


echo "<br>Oppgave 4: <br>";
$validation = new Validation();
$validation->validateEmail("1234@gmail.com");
$validation->validatePassword("Senbonzakura37!");
$validation->validatePhoneNumber("+47", "123 45 678");