<?php 

require ('functions.php');

$query = "
    INSERT INTO notifications (id, email, createdAt)
    SELECT id, email, NOW()
    FROM reservationdb
    WHERE id NOT IN (SELECT id FROM notifications)
";

// Execute the query
$result = mysqli_query($conn, $query);


if ($result) {
    echo "Notifications table updated successfully.";
} else {
    echo "Error updating notifications: " . mysqli_error($conn);
}


mysqli_close($conn);
?>