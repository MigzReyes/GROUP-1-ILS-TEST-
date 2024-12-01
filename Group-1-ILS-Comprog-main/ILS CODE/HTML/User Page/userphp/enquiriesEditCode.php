<?php 

require('./functions.php');

if (isset($_POST['save'])) {
    $phoneNumber = validate($_POST['phoneNumber']);
    $numGuest = validate($_POST['numGuest']);
    $dateTime = validate($_POST['dateTime']);
    $reservation = validate($_POST['reservation']);
    $email = $_SESSION['loggedInUser']['email'];

    // Debug inputs
    var_dump($phoneNumber, $numGuest, $dateTime, $reservation, $email);

    // Check if the email exists in the database
    $queryFetch = "SELECT * FROM reservationdb WHERE email = '$email'";
    $resultFetch = mysqli_query($conn, $queryFetch);
    if (mysqli_num_rows($resultFetch) == 0) {
        die('No record found for this email.');
    }
    $currentData = mysqli_fetch_assoc($resultFetch);

    // Check if data is different
    if (
        $currentData['phoneNumber'] == $phoneNumber &&
        $currentData['numGuest'] == $numGuest &&
        $currentData['dateTime'] == $dateTime &&
        $currentData['reservation'] == $reservation
    ) {
        die('No changes detected. Please modify the form data to update.');
    }

    if ($phoneNumber != '' && $numGuest != '' && $dateTime != '' && $reservation != '') {
        $query = "UPDATE reservationdb SET 
                phoneNumber = '$phoneNumber', 
                numGuest = '$numGuest', 
                dateTime = '$dateTime', 
                reservation = '$reservation' 
                WHERE email = '$email'";

        // Debug the query
        echo $query;

        $result = mysqli_query($conn, $query);
        if (!$result) {
            die('Error executing query: ' . mysqli_error($conn));
        }

        if (mysqli_affected_rows($conn) > 0) {
            redirect('../Enquiries-View.php', 'Reservation Form Edited Successfully');
        } else {
            redirect('../Enquiries-Edit.php', 'No data were updated');
        }
    } else {
        die('Please fill all the input fields.');
    }
}

?>