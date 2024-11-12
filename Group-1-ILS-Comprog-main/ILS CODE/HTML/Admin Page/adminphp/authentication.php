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
                redirect ('../LogInPage.php', 'Access denied');

            } else {
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                if ($row['role'] != 'admin') {
                    logoutSession();
                    redirect ('../LogInPage.php', 'Access denied');
                }
            }
        } else {

            logoutSession();
            redirect ('../LogInPage.php', 'Something went wrong');
        }
    }
} else {
    redirect ('../LogInPage.php', 'Log in to continue...');
}

?>