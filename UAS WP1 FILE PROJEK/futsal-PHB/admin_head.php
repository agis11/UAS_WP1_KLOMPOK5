<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Futsal</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Admin Futsal</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <?php 
            if(!empty($_SESSION['nama'])){?>
            <li><a href="admin_user.php">Data user</a></li>
            <?php } ?>
            <?php 
            if(!empty($_SESSION['nama'])){?>
            <li><a href="admin_booking.php">Data pemesan</a></li>
            <?php } 
            if(!empty($_SESSION['nama'])){?>
            <li><a href="admin_lapangan.php">Data lapangan</a></li>
            <?php } 
            if(!empty($_SESSION['nama'])){?>
            <li><a href="admin_transfer.php">Data Transfer</a></li>
            <?php } 
            if(!empty($_SESSION['nama'])){?>
            <li><a href="logout.php">Keluar</a></li>
            <?php } ?>

          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    

<br><br><br><br>
<div class="container">