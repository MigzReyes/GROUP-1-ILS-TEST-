<?php
require ('../HTML/Admin Page/adminphp/functions.php');

// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "matsurikadb");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST['submitSignup'])) {
        $firstName = $_POST['firstName'] ?? "";
        $lastName = $_POST['lastName'] ?? "";
        $email = $_POST['email'] ?? "";
        $phoneNumber = $_POST['phoneNumber'] ?? "";
        $password = $_POST['password'] ?? "";
        $conPassword = $_POST['conPassword'] ?? "";
        $role = "user";

        if ($password == $conPassword) {

            // Check Email
            $checkEmail = "SELECT email FROM adduser WHERE email='$email'";
            $checkEmail_run = mysqli_query($conn, $checkEmail);

            if (mysqli_num_rows($checkEmail_run) > 0) {

                redirect ('../HTML/SignUpPage.php', 'Email Already Exist');

            } else { 
                // Use prepared statements to prevent SQL injection
                $stmt = $conn->prepare("INSERT INTO adduser (firstName, lastName, email, phoneNumber, password, role) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("sssiss", $firstName, $lastName, $email, $phoneNumber, $password, $role);

                if ($stmt->execute()) {
                    // Redirect to another page after successful insertion
                    redirect ('../HTML/LogInPage.php', 'Succesfully Signed In');
                    exit;
                } else {
                    // Show error message
                    echo "Error: " . $stmt->error;
                }

                // Close the statement
                $stmt->close();
            }

        } else {
            redirect ('../HTML/SignUpPage.php', 'Password and Confirm Password does not match');
        }

    }

    // Close the database connection
    $conn->close();
?>