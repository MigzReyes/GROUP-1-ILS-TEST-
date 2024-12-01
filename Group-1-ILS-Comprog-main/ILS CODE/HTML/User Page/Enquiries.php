<?php 

include('../User Page/layout/header.php');

if (!isset($_SESSION['loggedInUser'])) {
    redirect ('../HTML/RamenMatsurikaFrontPage.php');
}


$email = $_SESSION['loggedInUser']['email'];

$query = "SELECT email, phoneNumber, numGuest, dateTime, reservation FROM reservationdb WHERE email = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

?>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <!--CARD HEADER-->
                <div class="card-header">
                    <h4>
                         Enquiries
                    </h4>
                </div>

                <!--CARD BODY-->
                <div class="card-body">

                    <?php alertMessage(); ?>

                    <table class="table table-striped">
                        
                        <!--TABLE HEAD-->
                        <thead>
                            <tr>
                                <th>Phone Number</th>
                                <th>#Guest</th>
                                <th>Date</th>
                                <th>Reservation</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <!--TABLE DATA-->
                        <tbody>
                            <?php 
                                if ($result && $result->num_rows > 0): 
                            ?>
                            <?php while ($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($row['phoneNumber']); ?></td>
                                    <td><?php echo htmlspecialchars($row['numGuest']); ?></td>
                                    <td><?php 
                                        $date = new DateTime($row['dateTime']);
                                        echo $date->format('Y-m-d h:i A'); 
                                    ?></td>
                                    <td><?php echo htmlspecialchars($row['reservation']); ?></td>
                                    <td>
                                        <a href="./Enquiries-View.php?email=<?php echo urlencode($row['email']); ?>" class="btn btn-success btn-md" style="display: block;">View</a>
                                        <br>
                                        <a href="./EnquiriesDelete.php?email=<?php echo urlencode($row['email']); ?>" class="btn btn-danger btn-md" style="display: block;" onclick="return confirm('Are you sure you want to delete this data? This action cannot be undone.')">Delete</a>

                                    </td>
                                </tr>
                            <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7">No Record Found</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php include('../Admin Page/layout/footer.php') ?>