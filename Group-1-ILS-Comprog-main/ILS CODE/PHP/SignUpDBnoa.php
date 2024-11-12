<?php
require ('../HTML/Admin Page/adminphp/functions.php');

// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "matsurikadb");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get form data
        $firstName = $_POST['firstName'] ?? "";
        $lastName = $_POST['lastName'] ?? "";
        $email = $_POST['email'] ?? "";
        $phoneNumber = $_POST['phoneNumber'] ?? "";
        $password = $_POST['password'] ?? "";
        $role = "user";

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

    // Close the database connection
    $conn->close();
?>