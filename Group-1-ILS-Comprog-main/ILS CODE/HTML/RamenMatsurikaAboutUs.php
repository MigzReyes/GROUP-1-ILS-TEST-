<?php
require ('../HTML/User Page/userphp/functions.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--LINK NG EXTERNAL CSS FILE-->
    <link rel="stylesheet" href="../CSS/CSS ABoutUs.css">
    <link id="pagestyle" href="../HTML/User Page/assets/css/soft-ui-dashboard.css" rel="stylesheet" />
    <link rel="stylesheet" href="../HTML/User Page/assets/scss/soft-ui-dashboard.scss">
        
    <!--TAB LOGO-->
    <link rel="Icon" href="https://i.ibb.co/c3DkSHT/matsurika-10.png">
    <!--TITLE-->
    <title>RAMEN Matsurika</title>

    <!--FOOTER ICONS (FACEBOOK, INSTAGRAM, TWITTER)-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<!--MAIN SECTION--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
    
<body>
    <!--HEADER (NAVBAR)-->
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
                                    <a class="dropdown-item" href=""><?php echo $_SESSION['loggedInUser']['firstName'].' '.$_SESSION['loggedInUser']['lastName']; ?></a>
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
        
<!--SITE PAGE SECTION--------------------------------------------------------------------------------------------------------->
    <div class="image-top-container">
        <div class="image-top">
            <img src="https://i.ibb.co/SwgLJtG/Juliana-Silva-Present-1260-x-345-px-7.png" alt="">

            <!--OPTIONAL TEXT-->
            <div class="image-text">
                <div class="ramen-Aboutus-text">
                    <h1>About</h1>
                    <h1 class="color-text">Us</h1>
                </div>

                <div class="ramen-matsurika-text">
                    <b>The completeness of Japanese ramen. in a holistic bowl of common flavors of soy sauce and miso together with typical toppings including sliced pork, nori, menma, and scallions. Offering this street food with a class and exquisite taste of total indulgence.</b>
                </div>
            </div>
        </div>
    </div>    

    <!--how it started-->
    <section class="about-matsurika">
        <img src="https://i.ibb.co/2njtdhL/Ewan-700-x-1000-px.png" alt="">
        <div class="Matsu">
            <h2><b>Matsurika</b></p></h2>
        </div>

        <div class="rika">
            <h6>Try the best ramen here in Matsurika ramen</h6>
        </div>

            
        <div class="paragraph">
            <p>
                Ramen is a beloved Japanese noodle soup dish that originated from Chinese-style<br>noodles,
                but has since evolved into a cultural icon in Japan and worldwide.
                It <br>consists of four essential components: broth, noodles, toppings, and seasonings,<br>
                each of which can vary significantly depending on the region and style.
            </p></br>

            <p>
                More than just a meal, ramen has become a cultural symbol of comfort and culinary<br>
                creativity, with endless variations and innovations emerging globally, making it a 
                <br>favorite for food lovers everywhere.
            </p></br>

            <p>
                Matsurika is providing quality tonkatsu along with other authentic Japanese cuisine.<br>
                Since they have perfected the skill of Tonkatsu, Matsurika has become favorite <br>among people.
            </p></br>

            <p>
                Matsurika serves some food like the Shiro Chashumen, Kuro Chashumen and more<br> we have also 
                some side dishes like Chicken Karaage, Kani Salad, Salmon Sashimi<br> and more. This is what
                why Matsurika known for.
            </p></br>

            <p>
                Matsurika is a standards place for quality, service and cleanliness. 
                From responsibly<br> sourcing product ingredients, providing efficient and convenient 
                services to <br>maintaining cleanliness within our restaurants these are essential in our daily operations <br>and procedures.
            </p></br>

            <p>
                We are committed to giving you fresh, delicious meals every step of the way.
                This is the <br>simple belief that we keep in mind, to serve great-tasting products every single day.<br>
                Every one of our staff is committed to making you happy, and your love of delicious<br> food has allowed us to establish ourselves as a global institution.
                Our recipe is quality.<br> Our method for ensuring that any moment is the ideal time for Wendy's is that.
            </p></br>
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