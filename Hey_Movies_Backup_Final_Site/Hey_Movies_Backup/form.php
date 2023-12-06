<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sign Up Hey Movie Review</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- BOOTSTRAP - ICON -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
   <!-- BOOTSTRAP -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="./style/form.css">
  <link rel="stylesheet" href="./style/style.css">
  
  
  
  
</head>
<?php

require "./partials/nav.php";
?>

<div class="container">

  <?php
    session_start();

    if (isset($_SESSION['customer_email'])) {
        // User is already logged in, redirect to the dashboard
        header('Location: userdashboard.php');
        exit();
    }
    if (isset($_SESSION['message'])) {
      echo '<div class="alert alert-success">' . $_SESSION['message'] . '</div>';
      unset($_SESSION['message']);
  }
  ?>

<div class="">

    <div style="width: 100%; height: 300px; overflow: hidden;">
        <img src="images/tv1.jpg" alt="Welcome Image" style="display: block; margin-top: 6rem; width: 100%; height: auto; object-fit: cover; object-position: center center;">
</div>


<body>
    <div class="container">
      <h2 class="signup">Sign Up</h2>
      <form method = "POST" action="register_process.php">
        <div class="form-group">
        <label for="customer_firstname" style="color: #6B75EF;">First name</label> 
          <input type="text" class="form-control" id="customer_firstname" placeholder="Enter First Name" name="customer_firstname">
        </div>
          <div class="form-group">
          <label for="customer_lastname"style="color: #6B75EF;">Last Name:</label>
          <input type="text" class="form-control" id="customer_lastname" placeholder="Enter Last Name" name="customer_lastname">
        </div>
        <div class="form-group">
          <label for="customer_email"style="color: #6B75EF;">Email:</label>
          <input type="email" class="form-control" id="customer_email" placeholder="Enter Email" name="customer_email">
        </div>
        <div class="form-group">
          <label for="customer_phonenumber"style="color: #6B75EF;">Phone Number:</label>
          <input type="text" class="form-control" id="customer_phonenumber" placeholder="Enter Phone Number" name="customer_phonenumber">
        </div>
        <div class="form-group">
          <label for="customer_address"style="color: #6B75EF;">Address:</label>
          <input type="text" class="form-control" id="customer_address" placeholder="Enter Address" name="customer_address">
        </div>
          <div class="form-group">
          <label for="Customer_password"style="color: #6B75EF;">Password</label>
          <input type="password" class="form-control" id="Customer_password" placeholder="Enter Password" name="Customer_password">
        </div>
        <button type="submit" name="submit" class="btn btn-primary btn-lg">Submit</button>
      </form>

      <?php
      echo '<div class="container" style="margin-bottom: 40px;">';
      ?>




</div>   
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2021 Hey Movie Review. All rights reserved.</p>
    </footer>
  
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>