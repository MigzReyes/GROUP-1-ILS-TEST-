<?php

require ('userphp/functions.php');

$paramResult = checkParamId('id');
    if (is_numeric($paramResult)) {

        $userId = validate($paramResult);

        $users = getById('adduser', $userId);
        if ($users['status'] == 200) {

            $userDelete = deleteQuery('adduser', $userId);
            if ($userDelete) {

                session_unset();
                session_destroy();

                redirect('../../HTML/RamenMatsurikaFrontPage.php', 'Account Deleted Succesfully');

            } else {

                redirect('Profile.php', 'Something went wrong :(');

            }

        } else {

            redirect('Profile.php', 'Cannot get user id :(');
        }

    } else {
        redirect('Profile.php', $paramResult);
    }

?>