<?php 
  $pageName = pathinfo($_SERVER['SCRIPT_NAME'], PATHINFO_FILENAME);

  $pageName = ucwords(str_replace(['-', '_'], ' ', $pageName));

  $countQuery = "SELECT COUNT(*) AS unreadCount FROM notifications WHERE isRead = 0";
  $countResult = mysqli_query($conn, $countQuery);
  $unreadCount = 0;

  if ($countResult) {
    $countData = mysqli_fetch_assoc($countResult);
    $unreadCount = $countData['unreadCount'];
  }
?>

<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
              <?php echo $pageName?>
            </li>
          </ol>
          <h6 class="font-weight-bolder mb-0">
            <?php echo $pageName?>
          </h6>
        </nav>

        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          </div>

          <ul class="navbar-nav  justify-content-end">
            <!--NOTIFICATION-->
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell cursor-pointer"></i>
                <?php if ($unreadCount > 0): ?>
                        <span class="badge bg-danger rounded-circle text-xs ms-1"><?php echo $unreadCount; ?></span>
                <?php endif; ?>
              </a>
              <ul class="dropdown-menu  dropdown-menu-end  px-2 me-sm-n4" style="overflow-y: auto; max-height: 250px; scrollbar-width: thin;" aria-labelledby="dropdownMenuButton">
                <?php 
                $query = "SELECT * FROM notifications ORDER BY createdAt DESC";
                $enquiries = mysqli_query($conn, $query);

                if (mysqli_num_rows($enquiries) > 0) {
                  while ($enquiriesData = mysqli_fetch_assoc($enquiries)) {
                ?>
                  <li class="mb-2">
                    <a class="dropdown-item border-radius-md" href="./adminphp/markAsRead.php?id=<?php echo $enquiriesData['id']; ?>">
                      <div class="d-flex py-1" style="<?php echo $enquiriesData['isRead'] == 1 ? 'background-color: #f8f9fa; border-radius: 10px;':''; ?> padding-left: 5px;">
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="text-sm font-weight-normal mb-1">
                            <span class="font-weight-bold">New enquiries</span> from <?php echo $enquiriesData['email']; ?>
                          </h6>
                          <p class="text-xs text-secondary mb-0 ">
                            <i class="fa fa-clock me-1"></i>
                            <?php echo $enquiriesData['createdAt']; ?>
                            <a href="adminphp/deleteNotif.php?id=<?php echo $enquiriesData['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this notification?')">Delete</a>
                          </p>
                        </div>
                      </div>
                    </a>
                  </li>

                <?php
                }
                } else { ?>
                  <li class="mb-2">
                    <a class="dropdown-item border-radius-md" href="javascript:;">
                      <div class="d-flex py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="text-sm font-weight-normal mb-1">
                            <span class="font-weight-bold">No new notifications</span>
                          </h6>
                        </div>
                      </div>
                    </a>
                  </li>

                <?php
                }
                ?>
          
              </ul>
            </li>

            <li class="nav-item d-flex align-items-center">
              <a href="adminphp/logOut.php" class="nav-link text-body font-weight-bold px-0" style="font-size:0.90rem;" onclick="return confirm('Are you sure you want to log out??')">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Log Out</span>
              </a>
            </li>

            <!--SIDEBAR TOGGLE-->
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            
          </ul>
        </div>
      </div>
</nav>