<?php include('../Admin Page/layout/header.php') ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <!--CARD HEADER-->
                <div class="card-header">
                    <h4>
                        Edit User
                        <a href="./Accounts.php" class="btn btn-primary float-end">Back</a>
                    </h4>
                </div>

                <!--CARD BODY-->
                <div class="card-body">

                    <form action="./adminphp/EditAccountCode.php" method="POST">

                        <?php echo alertMessage() ?>

                        <?php 
                            $paramResult = checkParamId('id');
                            if (!is_numeric($paramResult)) {
                                echo '<h5>'.$paramResult.'</h5>';
                                return false;
                            }

                            $user = getById('adduser', checkParamId('id'));
                            if ($user['status'] == 200) {
                        ?>

                        <input type="hidden" name="userId" value="<?php echo $user['data']['id']; ?>" required>
                        
                        <div class="row">
                            <!--FULL NAME-->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>First Name</label>
                                    <input type="text" name="firstName" value="<?php echo $user['data']['firstName']; ?>" class="form-control" required>
                                </div>
                            </div>

                            <!--LASTNAME-->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Last Name</label>
                                    <input type="text" name="lastName" value="<?php echo $user['data']['lastName']; ?>" class="form-control" required>
                                </div>
                            </div>

                            <!--EMAil-->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Email</label>
                                    <input type="email" placeholder="user@email.com" name="email" value="<?php echo $user['data']['email']; ?>" class="form-control" required>
                                </div>
                            </div>

                            <!--PHONE NUMBER-->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Phone Number</label>
                                    <input type="tel" maxlength="11" pattern="^\d{11}$" title="Phone number must be exactly 11 digits" name="phoneNumber" value="<?php echo $user['data']['phoneNumber']; ?>" class="form-control" required>
                                </div>
                            </div>

                            <!--PASSWORD-->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Password</label>
                                    <input type="text" placeholder="Please use a strong password" name="password" value="<?php echo $user['data']['password']; ?>" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Confirm Password</label>
                                    <input type="text" name="conPassword" value="<?php echo $user['data']['password']; ?>" class="form-control" required>
                                </div>
                            </div>

                            <!--SELECT ROLE-->
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label>Select role</label>
                                    <select name="role" class="form-select" required>
                                        <option value="">Select Role</option>
                                        <option value="admin" <?php echo $user['data']['role'] == 'admin' ? 'Selected':'' ; ?>>Admin</option>
                                        <option value="staff" <?php echo $user['data']['role'] == 'staff' ? 'Selected':'' ; ?>>Staff</option>
                                        <option value="user" <?php echo $user['data']['role'] == 'user' ? 'Selected':'' ; ?>>User</option>
                                    </select>
                                </div>
                            </div> 

                            <!--BAN-->
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label>Ban</label>
                                    <br>
                                    <input type="checkbox" name="ban" style="width: 30px; height: 30px;" <?php echo $user['data']['ban'] == true ? 'checked':'' ; ?>>
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