<?php

require 'adminphp/functions.php';

$paramResult = checkParamId('id');
    if (is_numeric($paramResult)) {

        $userId = validate($paramResult);

        $users = getById('adduser', $userId);
        if ($users['status'] == 200) {

            $userDelete = deleteQuery('adduser', $userId);
            if ($userDelete) {

                redirect('Accounts.php', 'Account Deleted Succesfully');

            } else {

                redirect('Accounts.php', 'Something went wrong :(');

            }

        } else {

            redirect('Accounts.php', 'Cannot get user id :(');
        }

    } else {
        redirect('Accounts.php', $paramResult);
    }
?>