<?php 
require('userphp/functions.php'); 

include('userphp/authentication.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../Admin Page/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="https://i.ibb.co/c3DkSHT/matsurika-10.png">
  <title>
    RAMEN Matsurika
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,800" rel="stylesheet" />

  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/soft-ui-dashboard.css" rel="stylesheet" />

  <!--PAGINATION-->
  <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">

</head>

<body class="g-sidenav-show  bg-gray-100">

    <?php include('layout/sidebar.php') ?>

        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

            <?php include('layout/navbar.php') ?>

                <div class="container-fluid py-4">
