<?php include('../User Page/layout/header.php') ?>

<?php 
    if (!isset($_SESSION['loggedInUser'])) {
        redirect ('../HTML/RamenMatsurikaFrontPage.php');
    }

$user = $_SESSION['loggedInUser'];
?>

<?php echo alertMessage() ?>

<div class="row">
    <div class="col-md-12">
        <?php echo alertMessage() ?>
    </div>

    <form action="userphp/ProfileCode.php" method="POST">
        <!--HIDDEN INPUT FOR USER ID-->
        <input type="hidden" name="userId" value="<?php echo $user['id']; ?>" required>

        
        <hr class="border-light m-1">

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">First Name</label>
                    <input class="form-control" value="<?php echo $user['firstName']; ?>" type="text" name="firstName" id="firstName" required>   
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Last Name</label>
                    <input class="form-control mb-1" value="<?php echo $user['lastName']; ?>" type="text" name="lastName" id="lastName" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input class="form-control" value="<?php echo $user['email']; ?>" type="email" name="email" placeholder="user@email.com" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Phone Number</label>
                    <input class="form-control mb-1" value="<?php echo $user['phoneNumber']; ?>" type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" title="Format: 123-456-7890" placeholder="123-456-7890" maxlength="12" name="phoneNumber" id="phoneNumber" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input class="form-control" value="<?php echo $user['password']; ?>" type="password" name="password" id="password" autocomplete="off" required>
            
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input class="form-control" value="<?php echo $user['password']; ?>" type="password" name="conPassword" id="password" autocomplete="off" required>
                </div>
            </div>

            <!--BUTTONS-->
            <hr class="border-light m-0">
            <div class="d-flex justify-content-end mt-3">
                <input type="submit" class="btn btn-primary" name="saveChanges" value="Save Changes" required>
                <a href="javascript:history.back()" class="btn btn-default btn-sm">Cancel</a>
            </div>
        </div>
        <hr class="border-light m-3">
    </form>

<?php include('../User Page/layout/footer.php') ?>