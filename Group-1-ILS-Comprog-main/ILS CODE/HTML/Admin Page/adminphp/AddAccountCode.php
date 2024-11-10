<?php 

require ('./functions.php');

/*ADD USER BUTTON*/
if (isset($_POST['submit'])) {

    $fullName = validate($_POST['fullName']);
    $email = validate($_POST['email']);
    $phoneNumber = validate($_POST['phoneNumber']);
    $password = validate($_POST['password']);
    $role = validate($_POST['role']);   

    if ($fullName != '' && $email != '' && $phoneNumber != '' && $password != '' && $role != ''){
        $query = "INSERT INTO adduser (fullName, email, phoneNumber, password, role) 
                VALUES ('$fullName', '$email', '$phoneNumber', '$password', '$role')";

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