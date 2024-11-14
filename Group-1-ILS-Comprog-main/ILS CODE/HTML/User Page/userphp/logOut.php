<?php 
require ('./functions.php');

if (isset($_SESSION['auth'])) {
    
    logoutSession();
    redirect ('../../LogInPage.php', 'Logged Out Succesfully');
}

?>