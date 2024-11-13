<?php
    require ('../HTML/Admin Page/adminphp/functions.php');

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "matsurikadb";

    //DATABASE CONNECTION
    $conn = new mysqli($host, $user, $pass, $db);
    if ($conn->connect_error) {
        echo"Error! Failed to connect to database :(". $conn->connect_error;
    }

    if (isset($_POST["submitLogIn"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        if ($email != '' && $password != '') {
            //$sql = "SELECT * FROM adduser WHERE email = '$email' and password = '$password' LIMIT 1";
            $sql = "SELECT * FROM adduser WHERE email = '$email' LIMIT 1";
            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) == 1) {

                $row = mysqli_fetch_array($result);
                $passwordHash = password_hash($row['password'], PASSWORD_DEFAULT);
                
                if (password_verify($password, $passwordHash)) {
                    
                    // Check if the user is banned
                    if ($row['ban'] == 1) {
                        redirect('../HTML/LogInPage.php', 'You are Banned Please Contact Admin');
                    } else {
                        session_start();
    
                        // Check role and redirect to the page
                        if ($row['role'] == 'user') {
                            $_SESSION['auth'] = true;
                            $_SESSION['loggedInUserRole'] = $row['role'];
                            $_SESSION['loggedInUser'] = [
                                'name' => $row['name'],
                                'email' => $row['email']
                            ];
                            redirect ('../HTML/RamenMatsurikaFrontPage.php', 'Successfully logged in ');
                            exit();
                        } elseif ($row['role'] == 'admin' || $row['role'] == 'staff') {
                            $_SESSION['auth'] = true;
                            $_SESSION['loggedInUserRole'] = $row['role'];
                            $_SESSION['loggedInUser'] = [
                                'name' => $row['name'],
                                'email' => $row['email']
                            ];
                            redirect('../HTML/Admin Page/AdminPage.php', 'Successfully logged in');
                        }
                    }
    
                } else {
                    redirect('../HTML/LogInPage.php', 'Wrong Password');
                }
                
            } else {
                redirect ('../HTML/LogInPage.php', 'Invalid Email');
            }
        } else {
            redirect ('../HTML/LogInPage.php', 'Please fill out input fields');
        }
    }
?>