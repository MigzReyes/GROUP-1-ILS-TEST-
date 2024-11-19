<?php

require 'functions.php';

$paramResult = checkParamId('id');
    if (is_numeric($paramResult)) {

        $enquiriesId = validate($paramResult);

        $notif = getById('notifications', $enquiriesId);
        if ($notif['status'] == 200) {

            $notifDelete = deleteQuery('notifications', $enquiriesId);
            if ($notifDelete) {

                redirect('../Dashboard.php', 'Notification Deleted Succesfully');

            } else {

                redirect('../Dashboard.php', 'Something went wrong :(');

            }

        } else {

            redirect('../Dashboard.php', 'Cannot get notif id :(');
        }

    } else {
        redirect('../Dashboard.php', $paramResult);
    }
?>