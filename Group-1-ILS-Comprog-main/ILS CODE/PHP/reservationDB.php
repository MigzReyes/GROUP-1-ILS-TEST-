<?php
require ('../HTML/Admin Page/adminphp/functions.php');

$host = "localhost";
$user = "root";
$pass = "";
$db = "matsurikadb";

    //DATABASE CONNECTION
    $conn = new mysqli($host, $user, $pass, $db);
    if ($conn->connect_error) {
        echo"Error! Failed to connect to database :(". $conn->connect_error;
    }

    if (isset($_POST["submitdb"])) {
        $phoneNumber = validate($_POST["phoneNumber"]);
        $numGuest = validate($_POST["numGuest"]);
        $dateTime = validate($_POST["dateTime"]);
        $reservation = validate($_POST["dining"]);

        $query = "INSERT INTO reservationdb (phoneNumber, numGuest, dateTime, reservation)
            VALUES ('$phoneNumber', '$numGuest', '$dateTime', '$reservation')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            redirect ('../HTML/RamenMatsurikaFrontPage.php', 'Thank you for enquiring');
        } else {
            redirect ('../HTML/RamenMatsurikaReservation.php', 'Something went wrong');
        }
    }
?>