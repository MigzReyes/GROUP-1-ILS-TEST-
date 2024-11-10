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

                        <?php 
                            $paramResult = checkParamId('id');
                            if (!is_numeric($paramResult)) {
                                echo '<h5>'.$paramResult.'</h5>';
                                return false;
                            }

                            $user = getById('adduser', checkParamId('id'));
                            if ($user['status'] == 200) {
                        ?>

                        <input type="hidden" name="userId" value="<?php echo $user['data']['id']; ?>" require>
                        
                        <div class="row">
                            <!--FULL NAME-->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Full Name</label>
                                    <input type="text" name="fullName" value="<?php echo $user['data']['fullName']; ?>" class="form-control" require>
                                </div>
                            </div>

                            <!--EMAil-->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Email</label>
                                    <input type="text" name="email" value="<?php echo $user['data']['email']; ?>" class="form-control" require>
                                </div>
                            </div>

                            <!--PHONE NUMBER-->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Phone Number</label>
                                    <input type="text" name="phoneNumber" value="<?php echo $user['data']['phoneNumber']; ?>" class="form-control" require>
                                </div>
                            </div>

                            <!--PASSWORD-->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Password</label>
                                    <input type="text" name="password" value="<?php echo $user['data']['password']; ?>" class="form-control" require>
                                </div>
                            </div>
                    
                            <!--SELECT ROLE-->
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label>Select role</label>
                                    <select name="role" class="form-select" require>
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