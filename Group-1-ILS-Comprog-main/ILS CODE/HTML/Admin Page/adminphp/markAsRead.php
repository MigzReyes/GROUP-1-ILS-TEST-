<?php
require ('functions.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $query = "UPDATE notifications SET isRead = 1 WHERE id = $id";
    if (mysqli_query($conn, $query)) {
  
        header("Location: ../EnquiriesEdit.php?id=$id");
        exit;
    } else {
        echo "Error updating notification: " . mysqli_error($conn);
    }
} else {
    echo "No notification ID provided.";
}
?>