<?php 

require ('./functions.php');

/*SAVE BUTTON*/
if (isset($_POST['save'])) {
    $firstName = validate($_POST['firstName']);
    $lastName = validate($_POST['lastName']);
    $email = validate($_POST['email']);
    $phoneNumber = validate($_POST['phoneNumber']);
    $password = validate($_POST['password']);
    $conPassword = validate($_POST['conPassword']);
    $role = validate($_POST['role']);   
    $ban = validate($_POST['ban']) == true ? 1:0;

    $userId = validate($_POST['userId']);
    $user = getById('adduser', $userId);
    if ($user['status'] != 200) {
        redirect('../Edit-Accounts.php?id='.$userId, 'No id found');
    }

    if ($password == $conPassword) {

        $checkEmail = "SELECT email FROM adduser WHERE email='$email'";
        $checkEmail_run = mysqli_query($conn, $checkEmail);

        if (mysqli_num_rows($checkEmail_run) > 0) {

            redirect ('../Edit-Accounts.php?id='.$userId, 'Email Already Exist');

        } else {
            if ($firstName != '' && $lastName != '' && $email != '' && $phoneNumber != '' && $password != ''){
                $query = "UPDATE adduser SET 
                        firstName = '$firstName',
                        lastName = '$lastName',
                        email = '$email', 
                        phoneNumber = '$phoneNumber', 
                        password = '$password', 
                        role = '$role', 
                        ban = '$ban' 
                        WHERE id = '$userId'";
        
                $result = mysqli_query($conn, $query);
                if ($result){
                    redirect('../Accounts.php', 'Account Edited Succesfully');
                } else {
                    redirect('../Edit-Accounts.php'.$userId, 'Something went wrong :(');
                }
            } else {
                redirect('../Edit-Accounts.php?id='.$userId, 'Please fill all the input fields');
            }
        }
    } else {
        redirect ('../Edit-Accounts.php?id='.$userId, 'Password and Confirm Password does not match');
    }
}

?>