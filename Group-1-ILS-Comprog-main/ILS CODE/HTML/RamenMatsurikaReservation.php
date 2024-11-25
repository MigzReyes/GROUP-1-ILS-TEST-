<?php 
require ('../HTML/Admin Page/adminphp/functions.php');

if (!isset($_SESSION['loggedInUser'])) {
    redirect ('LogInPage.php', 'You need to log in before making a reservation');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--LINK NG EXTERNAL CSS FILE-->
    <link rel="stylesheet" href="../CSS/CSS Reservation.css">
    <link id="pagestyle" href="../HTML/User Page/assets/css/soft-ui-dashboard.css" rel="stylesheet" />
    <link rel="stylesheet" href="../HTML/User Page/assets/scss/soft-ui-dashboard.scss">
        
    <!--TAB LOGO-->
    <link rel="Icon" href="https://i.ibb.co/c3DkSHT/matsurika-10.png">

    <!--TITLE-->
    <title>RAMEN Matsurika</title>

    <!--FOOTER ICONS (FACEBOOK, INSTAGRAM, TWITTER)-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
</head>
<body>   
<!--MAIN SECTION--------------------------------------------------------------------------------------------------------->
<section class="image-background">

<!--HEADER-------------------------------------------------------------------------------------------------------------->
    <!--NAVBAR-->
    <header id="site-header">
        <div id="site-header-grid">
            <div class="header-flex">
                <!--LOGO-->
                <div class="logo">
                    <a href="../HTML/RamenMatsurikaFrontPage.php">
                    <img id="logo-image" src="https://i.ibb.co/zS94myh/Branding-Word-1200-x-200-px-1.png" alt="">
                    </a>
                </div>
    
                
                <!--NAVBAR-->
                <nav class="navbar">
                <!--LINK NG NAVBAR-->
                    <ul>
                        <li><a class="nav-buttons" href="../HTML/RamenMatsurikaFrontPage.php">HOME</a></li>
                        <li><a class="nav-buttons" href="../HTML/RamenMatsurikaMenu.php">MENU</a></li>
                        <li><a class="nav-buttons" href="../HTML/RamenMatsurikaAboutUs.php">ABOUT</a></li>
                        <li><a href="./RamenMatsurikaReservation.php" class="nav-buttons">RESERVATION</a></li>
                        
                        <?php 
                            if (isset($_SESSION['loggedInUser'])) :
                        ?>

                        <li class="dropdown">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-user me-lg-1"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="user-profile" href=""><?php echo $_SESSION['loggedInUser']['firstName'].' '.$_SESSION['loggedInUser']['lastName']; ?></a>
                                </li>

                                <hr class="my-2 border-bottom border-gray-200">
                                <li><a class="dropdown-item" href="
                                    <?php
                                        echo $_SESSION['loggedInUserRole'] == 'admin' || $_SESSION['loggedInUserRole'] == 'staff' 
                                        ? '../HTML/Admin Page/Dashboard.php'
                                        :'../HTML/User Page/Profile.php';
                                    ?>">


                                    <?php
                                        echo $_SESSION['loggedInUserRole'] == 'admin' || $_SESSION['loggedInUserRole'] == 'staff' 
                                        ? 'Admin Settings'
                                        :'Profile Settings';
                                    ?>   
                                </a></li>
                                <li><a class="dropdown-item" href="
                                <?php
                                        echo $_SESSION['loggedInUserRole'] == 'admin' || $_SESSION['loggedInUserRole'] == 'staff' 
                                        ? '../HTML/Admin Page/Enquiries.php'
                                        :'../HTML/User Page/Enquiries.php';
                                ?>">Enquiries</a></li>

                                <hr class="my-2 border-bottom border-gray-200">
                                <li><a class="dropdown-item" href="../HTML/User Page/userphp/logOut.php">Log Out</a></li>
                            </ul>
                        </li>

                        <?php else : ?>

                        <li><a class="nav-buttons" href="./LogInPage.php" style="margin-right: 5px; margin-left: 20px;">LOG IN</a></li>
                        <li><button class="nav-buttons-reservation"><a href="./SignUpPage.php">SIGN UP</a></button></li>

                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <!--MAIN FORM-------------------------------------------------------------------------------------------------------->
    <div class="site-container">
        <div class="site-flex">
            <form action="../PHP/reservationDB.php" method="post">
                <div class="main-form-flex">
                    <ul class="form-info">

                        <!--FORM HEADER-->
                        <li class="form-head">
                        <?php echo messagePopUp() ?>
                            <div class="form-head-info">
                                <h2>Book Now!</h2>
                                <div class="form-subtitle">Please fill the form below accurately to enable us serve you better! welcome!</div>
                            </div>
                        </li>

                        <!--PHONE-->
                        <li class="form-info-layout"> 
                            <label for="" class="form-label">Phone</label>

                            <div class="form-input">
                                <input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" title="Format: 123-456-7890" placeholder="123-456-7890" maxlength="12" class="input-textbox form-input" name="phoneNumber" id="phoneNumber" required>
                            </div>
                        </li>

                        <!--# NUMBER OF GUEST-->
                        <li class="form-info-layout">
                            <label for="" class="form-label">Number of Guest</label>

                            <div class="form-input">
                                <select name="numGuest" id="numGuest" class="input-textbox form-input" required>
                                    <option value="">Please Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="4">4</option>
                                    <option value="6">6</option>
                                </select>
                            </div>
                        </li>

                        <!--CALENDAR-->
                        <li class="form-info-layout">
                            <label for="" class="form-label">Date and Time</label>

                            <div class="form-input">
                                <input type="datetime-local" class="input-textbox form-input" name="dateTime" id="dateTime" required>
                            </div>
                        </li>

                        <!--RESERVATION TYPE-->
                        <li class="form-info-layout">
                            <label for="" class="form-label">Reservation Type</label>

                            <div class="form-input">
                                <select name="dining" id="dining" class="input-textbox form-input" required>
                                    <option value="">Please Select</option>
                                    <option value="private">Private</option>
                                    <option value="public">Public</option>
                                </select>
                            </div>
                        </li>

                        <!--SUBMIT BUTTON-->
                        <li class="submit-button-flex">
                            <div class="submit-button-container">
                                <div class="submit-button">
                                    <input type="submit" class="btn" name="submitdb" value="Submit" required>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </form>
        </div>
    </div>

</section>

<!--FOOTER--------------------------------------------------------------------------------------------------------------->
<footer id="footer">
    <div class="footer-container">
        <div class="footer-content">
            <div class="footer-info-flex">
                <section class="footer-logo">
                    <!--FOOTER LOGO-->
                    <div id="image-logo">
                        <a href="../HTML/RamenMatsurikaFrontPage.php"><img src="https://i.ibb.co/c3DkSHT/matsurika-10.png" alt=""></a>
                    </div>
                </section>
                <section>
                    <!--FOOTER INFO(number, location)-->
                    <div class="footer-address-flex">
                        <div class="footer-info-address">
                            <ul>
                                <li><span>(09) 5069-9899</span></li>
                                <li><span>Cavite: 4106, Rosario, Gen Trias Drive, STI Bldg</span></li>
                                <li><a href="ContactUs.php" class="contact-us">Contact us</a></li>
                            </ul>
                        </div>
                    </div>
                </section>
            </div>

            <div id="footer-widgets">
                <div class="footer-widgets-flex">
                    <!--FOOTER WIDGETS-->
                    <div class="footer-widgets-logo">
                        <div class="footer-widgets-container">
                            <div class="footer-widgets-image">
                                <a href="#"><span href="" class="fa fa-facebook"></span></a>
                                <a href="#"><span href="" class="fa fa-twitter"></span></a>
                                <a href="#"><span href="" class="fa fa-instagram"></span></a>
                            </div>
                        </div>
                    </div>

                    <!--COPYRIGHT-->
                    <div class="footer-copyright">
                        <div class="copyright-text">
                            <p>Copyright 2024 © All rights Reserved. RAMEN Matsurika PH</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>    

<!-- Include Bootstrap JS (requires Popper) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>