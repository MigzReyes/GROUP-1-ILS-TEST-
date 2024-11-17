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

    
    <!--HIDDEN INPUT FOR USER ID-->
    <input type="hidden" name="userId" value="<?php echo $user['id']; ?>" required>

    <div class="d-flex justify-content-end mt-3">
        <a class="btn btn-primary" href="DeleteAccount.php?id=<?php echo $user['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this account? This action cannot be undone.')">Delete Account</a>
    </div>
    <hr class="border-light m-2">

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">First Name</label>
                <input class="form-control" disabled value="<?php echo $user['firstName']; ?>" type="text" name="firstName" id="firstName" required>   
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">Last Name</label>
                <input class="form-control mb-1" disabled value="<?php echo $user['lastName']; ?>" type="text" name="lastName" id="lastName" required>
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input class="form-control" disabled value="<?php echo $user['email']; ?>" type="email" name="email" placeholder="user@email.com" required>
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">Phone Number</label>
                <input class="form-control mb-1" disabled value="<?php echo $user['phoneNumber']; ?>" type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" title="Format: 123-456-7890" placeholder="123-456-7890" maxlength="12" name="phoneNumber" id="phoneNumber" required>
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input class="form-control" disabled value="<?php echo $user['password']; ?>" type="password" name="password" id="password" autocomplete="off" required>
            </div>
        </div>

        <!--BUTTONS-->
        <hr class="border-light m-0">
        <div class="d-flex justify-content-end mt-3">
            <a href="../User Page/Edit-Profile.php" class="btn btn-primary">Edit Profile</a>
        </div>
    </div>
    <hr class="border-light m-3">
    

<?php include('../User Page/layout/footer.php') ?>