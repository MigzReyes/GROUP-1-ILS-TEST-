<?php include('../Admin Page/layout/header.php') ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <!--CARD HEADER-->
                <div class="card-header">
                    <h4>
                        Edit Reservation Form
                        <a href="./Enquiries.php" class="btn btn-primary float-end">Back</a>
                    </h4>
                </div>

                <!--CARD BODY-->
                <div class="card-body">

                    <form action="./adminphp/enquiriesEditCode.php" method="POST">

                        <?php 
                            $paramResult = checkParamId('id');
                            if (!is_numeric($paramResult)) {
                                echo '<h5>'.$paramResult.'</h5>';
                                return false;
                            }

                            $user = getById('reservationdb', checkParamId('id'));
                            if ($user['status'] == 200) {
                        ?>

                        <input type="hidden" name="userId" value="<?php echo $user['data']['id']; ?>" required>
                        
                        <div class="row">

                            <!--PHONE NUMBER-->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Phone Number</label>
                                    <input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" title="Format: 123-456-7890" placeholder="123-456-7890" maxlength="12" name="phoneNumber" value="<?php echo $user['data']['phoneNumber']; ?>" class="form-control" required>
                                </div>
                            </div>

                            <!--NUMBER OF GUEST-->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Number of Guest</label>
                                    <input type="number" min="1" max="20" name="numGuest" min="1" max="20" value="<?php echo $user['data']['numGuest']; ?>" class="form-control" required>
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
                                    <button type="save" name="save" class="btn btn-primary">Save</button>
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

<?php include('../Admin Page/layout/footer.php') ?>