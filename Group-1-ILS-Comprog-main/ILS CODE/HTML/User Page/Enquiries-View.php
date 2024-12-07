<?php 

include('./layout/header.php'); 

if (!isset($_SESSION['loggedInUser'])) {
    redirect ('../HTML/RamenMatsurikaFrontPage.php');
}


$email = $_SESSION['loggedInUser']['email'];

$query = "SELECT email, phoneNumber, numGuest, dateTime, reservation, created_at FROM reservationdb WHERE email = ? LIMIT 1";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Entry Receipt</title>
    <link rel="stylesheet" href=".././../CSS/CSS UserEnquiries.css">
</head>
<body>
<?php alertMessage(); ?>
    <div class="card-header">
        <h4>
            <a href="./Enquiries.php" class="btn btn-primary float-end">Back</a>
        </h4>
    </div>

    <div class="receipt-flex">
        <div>
            <div class="receipt">
                <div class="header">
                    <div class="logo">
                        <img src="https://i.ibb.co/c3DkSHT/matsurika-10.png">
                    </div>
                    <div class="title">
                        <h1>Reservation Entry</h1>
                        <h1>Receipt</h1>
                        <p>Matsurika ramen</p>
                    </div>

                    <?php 
                        if ($result && $result->num_rows > 0): 
                    ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="enquiry">
                        #Enquiries<br>
                        Date: <br> 
                            <?php 
                                $date = new DateTime($row['created_at']);
                                echo $date->format('Y-m-d'); 
                            ?>
                    </div>
                </div>

                <h2>Details</h2>
                <div class="divider"></div>

                <div class="details">
                    <div>
                        <span>Contact Information:</span>
                    </div>
                    <div>
                        <span><?php echo htmlspecialchars($row['email']); ?></span>
                        <span><?php echo htmlspecialchars($row['phoneNumber']); ?></span>
                    </div>
                    <div>
                        <span>Number of Guest:</span>
                        <span><?php echo htmlspecialchars($row['numGuest']); ?></span>
                    </div>
                    <div>
                        <span>Reservation type:</span>
                        <span><?php echo htmlspecialchars($row['reservation']); ?></span>
                    </div>
                    <div>
                        <span>Arrival Date and Time:</span>
                        <span>
                        <?php 
                            $date = new DateTime($row['dateTime']);
                            echo $date->format('Y-m-d h:i A'); 
                        ?>
                        </span>
                    </div>
                    <?php endwhile; ?>
                    <?php else: ?>
                    <tr>
                        <td colspan="7">No Record Found</td>
                    </tr>
                    <?php endif; ?>
                </div>

                <div class="divider"></div> 

                <div class="one-time">
                    ONE TIME USE   VALID UNTIL THE RESERVATION DATE
                </div>

                <div class="footer">
                    Copyright 2024 © All rights Reserved. RAMEN<br>
                    Matsurika PH
                </div>
            </div>
            
            <div class="card-header">
                <h4>
                    <a href="./Enquiries-Edit.php" class="btn btn-success float-end">Edit</a>
                </h4>
                <h4>
                    <button class="btn btn-primary" id="downloadScreenshot">Screenshot</button>
                </h4>
            </div>
        </div>
    </div>
</body>
</html>

<?php include('./layout/footer.php'); ?>