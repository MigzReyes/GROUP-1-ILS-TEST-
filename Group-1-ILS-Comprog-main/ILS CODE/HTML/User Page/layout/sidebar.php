<?php 
  $pageName = substr($_SERVER['SCRIPT_NAME'], strripos($_SERVER['SCRIPT_NAME'], "/") +1);
?>


<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
<!--LOGO AND NAME-->
    <div class="sidenav-header">
      <a class="navbar-brand m-0" href=".././RamenMatsurikaFrontPage.php">
        <img src="https://i.ibb.co/c3DkSHT/matsurika-10.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">RAMEN Matsurika</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">

<!--MAIN SIDEBAR-->
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">

        <!--ADMIN / USER-->
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Profile Settings</h6>
        </li>

        <li class="nav-item">
          <a class="nav-link <?php echo $pageName == 'Profile.php' || $pageName == 'Edit-Profile.php' ? 'active':''; ?>"
          href="Profile.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-user <?php echo $pageName == 'Profile.php' || $pageName == 'Edit-Profile.php' ? 'text-white':'text-dark'; ?> text-lg"></i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>

        <!--ENQUIRIES-->
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Enquiries</h6>
        </li>

        <li class="nav-item">
          <a class="nav-link <?php echo $pageName == 'Enquiries.php' ? 'active':''; ?>"
          href="Enquiries.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-bullhorn <?php echo $pageName == 'Enquiries.php' ? 'text-white':'text-dark'; ?> text-lg"></i>
            </div>
            <span class="nav-link-text ms-1">Enquiries</span>
          </a>
        </li>

    
<!--FOOTER-->
    <div class="sidenav-footer mx-3 ">
      <a class="btn btn-primary mt-3 w-100" href="../RamenMatsurikaFrontPage.php">Home</a>
    </div>
</aside>