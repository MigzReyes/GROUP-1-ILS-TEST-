<?php

require 'adminphp/functions.php';

$paramResult = checkParamId('id');
    if (is_numeric($paramResult)) {

        $userId = validate($paramResult);

        $users = getById('reservationdb', $userId);
        if ($users['status'] == 200) {

            $userDelete = deleteQuery('reservationdb', $userId);
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