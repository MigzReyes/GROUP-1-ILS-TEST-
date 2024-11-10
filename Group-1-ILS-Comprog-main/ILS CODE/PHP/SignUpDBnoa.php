<?php
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "matsurikadb");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get form data
        $fullName = $_POST['fullName'] ?? "";
        $email = $_POST['email'] ?? "";
        $phoneNumber = $_POST['phoneNumber'] ?? "";
        $password = $_POST['password'] ?? "";
        $role = "user";

        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO adduser (fullName, email, phoneNumber, password, role) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssiss", $fullName, $email, $phoneNumber, $password, $role);

        if ($stmt->execute()) {
            // Redirect to another page after successful insertion
            header("Location: ../HTML/LogInPage.html");
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