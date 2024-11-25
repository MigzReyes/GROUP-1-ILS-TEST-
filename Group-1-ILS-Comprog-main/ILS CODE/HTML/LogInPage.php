<?php 
require ('../HTML/Admin Page/adminphp/functions.php');

if (isset($_SESSION['auth'])) {
    redirect ('../HTML/RamenMatsurikaFrontPage.php', 'You are already logged in');
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--LINK NG EXTERNAL CSS FILE-->
    <link rel="stylesheet" href="../CSS/CSS Log In.css">
        
    <!--TAB LOGO-->
    <link rel="Icon" href="https://i.ibb.co/c3DkSHT/matsurika-10.png">

    <!--TITLE-->
    <title>RAMEN Matsurika</title>

    <!--FOOTER ICONS (FACEBOOK, INSTAGRAM, TWITTER)-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

    <section class="image-background">
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
                                <li><a class="nav-buttons" href="./LogInPage.php" style="margin-right: 5px; margin-left: 20px;">LOG IN</a></li>
                                <li><button class="nav-buttons-reservation"><a href="./SignUpPage.php">SIGN UP</a></button></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </header>

            <!--MAIN FORM------------------------------------------------------------------------------------------------------>
            <div class="container">
                <div class="box form-box">

                    <?php echo messagePopUp(); ?>

                    <header>Login</header>
                    <form action="../PHP/LogInDBnoa.php" method="post">
                        <div class="field input">
                            <label for="email">Email</label>
                            <input type="email" placeholder="user@email.com" name="email" id="email" autocomplete="off" required>
                        </div>

                        <div class="field input">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" autocomplete="off" required>
                        </div>

                        <div class="field">
                            <input type="submit" class="button" name="submitLogIn" value="Login" required>
                        </div>
                        <div class="links">
                            Don't have account? <a href="SignUpPage.php">Sign up now</a>
                        </div>
                    </form>
                </div>
            </div>
    </section>
<!--FOOTER------------------------------------------------------------------------------------------------------------>
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
</body>
</html>