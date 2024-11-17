<?php
require ('functions.php');

if (isset($_POST['saveChanges'])) {
    $firstName = validate($_POST['firstName']);
    $lastName = validate($_POST['lastName']);
    $email = validate($_POST['email']);
    $phoneNumber = validate($_POST['phoneNumber']);
    $password = validate($_POST['password']);
    $conPassword = validate($_POST['conPassword']);

    $userId = validate($_POST['userId']);
    $user = getById('adduser', $userId);
    if ($user['status'] == 200) {
        $user = $user['data'];
    } else {
        redirect('../Profile.php?id='.$userId, 'No id found');
    }

    if ($password == $conPassword) {

        $checkEmail = "SELECT * FROM adduser WHERE email='$email' AND id!='$userId' LIMIT 1";
        $resultEmail = mysqli_query($conn, $checkEmail);
        if (mysqli_num_rows($resultEmail) > 0) {
            redirect ('../Edit-Profile.php?id='.$userId, 'Email already exist');
        } else {
            if ($firstName != '' && $lastName != '' && $email != '' && $phoneNumber != '' && $password != '') {
                $query = "UPDATE adduser SET
                firstName = '$firstName',
                lastName = '$lastName',
                email = '$email',
                phoneNumber = '$phoneNumber',
                password = '$password'
                WHERE id = '$userId'";

                $result = mysqli_query($conn, $query);
                if ($result) {
                    $updatedUserQuery = "SELECT * FROM adduser WHERE id = '$userId' LIMIT 1";
                    $updatedUserResult = mysqli_query($conn, $updatedUserQuery);
            
                    if ($updatedUserResult && mysqli_num_rows($updatedUserResult) > 0) {
                        $updatedUser = mysqli_fetch_assoc($updatedUserResult);
                        $_SESSION['loggedInUser'] = $updatedUser;
                    }

                    redirect ('../Profile.php', 'Account edited succesfully');
                } else {
                    redirect ('../Profile.php?id='.$userId, 'Something went wrong');
                }
            } else {
                redirect ('../Edit-Profile.php?id='.$userId, 'Please fill out all input field');
            }
        }

    } else {
        redirect ('../Edit-Profile.php?id='.$userId, 'Password and Confirm Password does not match');
    }
}

?>