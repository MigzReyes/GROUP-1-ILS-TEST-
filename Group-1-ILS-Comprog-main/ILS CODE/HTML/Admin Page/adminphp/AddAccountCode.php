<?php 

require ('./functions.php');

/*ADD USER BUTTON*/
if (isset($_POST['submit'])) {

    $firstName = validate($_POST['firstName']);
    $lastName = validate($_POST['lastName']);
    $email = validate($_POST['email']);
    $phoneNumber = validate($_POST['phoneNumber']);
    $password = validate($_POST['password']);
    $role = validate($_POST['role']);   

    if ($firstName != '' && $lastName != '' && $email != '' && $phoneNumber != '' && $password != '' && $role != ''){
        $query = "INSERT INTO adduser (firstName, lastName, email, phoneNumber, password, role) 
                VALUES ('$firstName', '$lastName', '$email', '$phoneNumber', '$password', '$role')";

        $result = mysqli_query($conn, $query);
        if ($result){
            redirect('../Accounts.php', 'Account Added Succesfully');
        } else {
            redirect('../AddAccounts.php', 'Something went wrong :(');
        }
    } else {
        redirect('../AddAccounts.php', 'Please fill all the input fields');
    }
}


?>