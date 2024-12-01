<?php include('./layout/header.php') ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <!--CARD HEADER-->
                <div class="card-header">
                <?php alertMessage(); ?>
                    <h4>
                        Edit Reservation Form
                        <a href="./Enquiries-View.php" class="btn btn-primary float-end">Back</a>
                    </h4>
                </div>

                <!--CARD BODY-->
                <div class="card-body">

                    <form action="userphp/enquiriesEditCode.php" method="POST">

                        <?php 
                            $user = getByEmail('reservationdb', $email);
                            if ($user['status'] == 200) {
                        ?>
                        <div class="row">
                            <!--FIRST NAME-->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">First Name</label>
                                    <input class="form-control" disabled value="<?php echo $user['data']['firstName']; ?>" type="text" name="firstName" id="firstName" required>   
                                </div>
                            </div>
                    

                            <!--LAST NAME-->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Last Name</label>
                                    <input class="form-control" disabled value="<?php echo $user['data']['lastName']; ?>" type="text" name="lastName" id="lastName" required>
                                </div>
                            </div>
                    
                            <!--EMAIL-->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input class="form-control" disabled value="<?php echo $user['data']['email']; ?>" type="email" name="email" placeholder="user@email.com" required>
                                </div>
                            </div>
                    
                            <!--PHONE NUMBER-->
                            <div class="col-md-6">
                                <div class="mb-3"> 
                                    <label>Phone Number</label>
                                    <input type="tel" maxlength="11" pattern="^\d{11}$" title="Phone number must be exactly 11 digits" name="phoneNumber" value="<?php echo $user['data']['phoneNumber']; ?>" class="form-control" required>
                                </div>
                            </div>
                        

                            <!--NUMBER OF GUEST-->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Number of Guest</label>
                                    <select name="numGuest" id="numGuest" class="form-control" required>
                                        <option value="">Please Select</option>
                                        <option value="1" <?php echo $user['data']['numGuest'] == '1' ? 'Selected':'' ; ?> >1</option>
                                        <option value="2" <?php echo $user['data']['numGuest'] == '2' ? 'Selected':'' ; ?> >2</option>
                                        <option value="4" <?php echo $user['data']['numGuest'] == '4' ? 'Selected':'' ;; ?> >4</option>
                                    </select>
                                </div>
                            </div>

                            <!--DATE-->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Date</label>
                                    <input type="datetime-local" name="dateTime" value="<?php echo $user['data']['dateTime']; ?>" class="form-control" required>
                                </div>
                            </div>

                            <!--RESERVATION-->
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label>Reservation</label>
                                    <select name="reservation" class="form-select" required>
                                        <option value="">Please Select</option>
                                        <option value="private" <?php echo $user['data']['reservation'] == 'private' ? 'Selected':'' ; ?>>Private</option>
                                        <option value="public" <?php echo $user['data']['reservation'] == 'public' ? 'Selected':'' ; ?>>Public</option>
                                    </select>
                                </div>
                            </div>
                            
                            <!--SUBMIT-->
                            <div class="col-md-6">
                                <div class="mb-3 text-end">
                                    <br/>
                                    <button type="save" name="save" class="btn btn-primary" onclick="return confirm('Are you sure you want to save the changes?')">Save</button>
                                </div>
                            </div>
                        </div>
                        <?php
                            } else {
                                echo '<h5>'.$user['message'].'</h5>';
                            }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include('./layout/footer.php') ?>