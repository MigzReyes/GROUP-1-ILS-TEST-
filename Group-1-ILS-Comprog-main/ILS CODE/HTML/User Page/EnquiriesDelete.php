<?php

require 'userphp/functions.php';

$paramResult = checkParamId('email');
    if ($paramResult) {

        $email = validate($paramResult);

        $users = getByEmail('reservationdb', $email);
        if ($users['status'] == 200) {

            $userDelete = deleteQueryForm('reservationdb', $email);
            if ($userDelete) {

                redirect('Enquiries.php', 'Reservation Form Deleted Succesfully');

            } else {

                redirect('Enquiries.php', 'Something went wrong :(');

            }

        } else {

            redirect('Enquiries.php', 'Cannot get user id :(');
        }

    } else {
        redirect('Enquiries.php', $paramResult);
    }
?>