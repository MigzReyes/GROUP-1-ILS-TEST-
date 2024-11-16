<?php

if (isset($_SESSION['auth'])) {

    if (isset($_SESSION['loggedInUserRole'])) {

        $role = validate($_SESSION['loggedInUserRole']);
        $email = validate($_SESSION['loggedInUser']['email']);

        $query = "SELECT * FROM adduser WHERE email='$email' AND role='$role' LIMIT 1";
        $result = mysqli_query($conn, $query);

        if ($result) {

            if (mysqli_num_rows($result) == 0) {
                
                logoutSession();
                redirect ('../LogInPage.php', 'Access Denied');

            } else {
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                if ($row['ban'] == 1) {
                    logoutSession();
                    redirect ('../LogInPage.php', 'You are banned. Please contact admin');
                } elseif ($row['role'] != 'admin' && $row['role'] != 'staff') {
                    logoutSession();
                    redirect ('../LogInPage.php', 'Access Denied');
                } 
            }
        } else {
            logoutSession();
            redirect ('../LogInPage.php', 'Access Denied');
            
        }
    }
} else {
    redirect ('../LogInPage.php', 'Log in to continue...');
}

?>