<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- BOOTSTRAP - ICON -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
   <!-- BOOTSTRAP -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="./style/style.css">
  <link rel="stylesheet" href="./style/login.css">
 
</head>

<!-- Bring the menu to the page -->
<?php require "./partials/nav.php";?> 

<div class="container">
    
  <?php
    session_start();

    if (isset($_SESSION['customer_email'])) {
        // User is already logged in, redirect to the dashboard
        header('Location: userdashboard.php');
        exit();
    }
  ?>


<div class="container">

    <div style="width: 100%; height: 300px; overflow: hidden;">
        <img src="images/tv2.jpg" alt="Welcome Image" style="display: block; margin-top: 6rem; width: 100%; height: auto; object-fit: cover; object-position: center center;">
</div>

<body>    

    <div class="jumbotron mt-4">
        <h1 class="display-4 text-center">Login</h1>
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="customer_email">Enter your email</label>
                <input type="text" class="form-control" id="customer_email" name="customer_email" required>
            </div>
            <div class="form-group">
                <label for="Customer_password">Enter your password</label>
                <input type="password" class="form-control" id="Customer_password" name="Customer_password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
            <a href="index.php" class="btn btn-outline-primary">Back</a>
        </form>
    </div>
                <?php
                echo '<div class="container" style="margin-top: 20px; color:#ffffff;">';
                ?>
                <br>
                <p style="font-size: 20px;">Don't have an account? <a href="form.php" style="color: #ffffff; text-decoration: none;">Register here</a>.</p>
                <br>
                <br>                
           
            </div>
        </div>
    </div>   
       

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