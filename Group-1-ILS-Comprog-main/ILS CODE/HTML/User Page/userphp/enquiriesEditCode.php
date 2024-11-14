<?php 

require ('./functions.php');

/*SAVE BUTTON*/
if (isset($_POST['save'])) {
    $phoneNumber = validate($_POST['phoneNumber']);
    $numGuest = validate($_POST['numGuest']);
    $dateTime = validate($_POST['dateTime']);   
    $reservation = validate($_POST['reservation']);

    $userId = validate($_POST['userId']);
    $user = getById('reservationdb', $userId);
    if ($user['status'] != 200) {
        redirect('../EnquiriesEdit.php?id='.$userId, 'No id found');
    }

    if ($phoneNumber != '' && $numGuest != '' && $dateTime != '' && $reservation != ''){
        $query = "UPDATE reservationdb SET 
                phoneNumber = '$phoneNumber', 
                numGuest = '$numGuest', 
                dateTime = '$dateTime', 
                reservation = '$reservation' 
                WHERE id = '$userId'";

        $result = mysqli_query($conn, $query);
        if ($result){
            redirect('../Enquiries.php', 'Reservation Form Edited Succesfully');
        } else {
            redirect('../EnquiriesEdit.php', 'Something went wrong :(');
        }
    } else {
        redirect('../EnquiriesEdit.php', 'Please fill all the input fields');
    }
}

?>