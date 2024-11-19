<?php include('../Admin Page/layout/header.php') ?>

<?php echo alertMessage() ?>

<div class="row" style="margin: 0px 0px 100px 0px">
    <div class="col-md-12">
        <?php echo alertMessage() ?>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card card-body p-3">
            <p class="text-sm mb-0 text-capitalize font-weight-bold">Enquiries</p>
            <h5 class="font-weight-bolder mb-0">
                <?php echo getCount('reservationdb') ?>
            </h5>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card card-body p-3">
            <p class="text-sm mb-0 text-capitalize font-weight-bold">Accounts</p>
            <h5 class="font-weight-bolder mb-0">
                <?php echo getCount('adduser') ?>
            </h5>
        </div>
    </div>
</div>


<?php include('../Admin Page/layout/footer.php') ?>