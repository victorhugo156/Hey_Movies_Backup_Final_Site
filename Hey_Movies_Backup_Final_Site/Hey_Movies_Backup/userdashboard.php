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
   <link rel="stylesheet" href="./style/style.css">
   <link rel="stylesheet" href="./style/userdashboard.css">
    
    
</head>

<?php require "./partials/nav.php"?>

<body>
    <div class="container-config">
    
    <?php
        session_start();
    
        // Check if the user is logged in
        if (!isset($_SESSION['customer_email'])) {
            // User is not logged in, redirect to the login page
            header('Location: login.php');
            exit();
        }
    
        // Check if there's a message in the session
        if (isset($_SESSION['message'])) {
            // Display the message and remove it from the session
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
    
        // Check if the user is logged in
        if (!isset($_SESSION['customer_email'])) {
            // Not logged in, redirect to the login page
            header('Location: loginform.php');
            exit();
        }
    
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db = "hey_movies";
    
        // Create connection
        $conn = new mysqli($servername, $username, $password, $db);
    
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    
        // Get the user's details
        $sql = "SELECT * FROM customerinformation WHERE customer_email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $_SESSION['customer_email']);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($row = $result->fetch_assoc()) {
            // User exists, display their details
            echo '
            <div class="container mt-5">
            
                 <div class="list-group-item active">
                 <br>
                 <h1>Welcome, ' . htmlspecialchars($row['customer_firstname']) . ' ' . htmlspecialchars($row['customer_lastname']) . '!</h1>
                 </div>
                <br>
                    <div style="width: 100%; height: 300px; overflow: hidden;">
                        <img src="images/tv3.jpg" alt="Welcome Image" style="display: block; margin: auto; width: 100%; height: auto; object-fit: cover; object-position: center center;">
                    </div>
                 
                <div class="list-group mt-5">
                    <div class="list-group-item active">
                        Your Details
                    </div>
                    <!-- User details go here -->
                </div>            
                  
                <p><strong>First Name:</strong> ' . htmlspecialchars($row['customer_firstname']) . '</p>
                <p><strong>Last Name:</strong> ' . htmlspecialchars($row['customer_lastname']) . '</p>
                <p><strong>Email:</strong> ' . htmlspecialchars($row['customer_email']) . '</p>
                <p><strong>Phone Number:</strong> ' . htmlspecialchars($row['customer_phonenumber']) . '</p>
                <p><strong>Address:</strong> ' . htmlspecialchars($row['customer_address']) . '</p>
                
                <br>
                
                <div class="list-group mt-5">
                <div class="list-group-item active">
                    Update your details here
                </div>                        
    
                <form action="update_user.php" method="post" class="mt-4">
                
                    <div class="form-group">
                        <label for="firstname">First name:</label>
                        <input type="text" id="firstname" name="firstname" value="' . htmlspecialchars($row['customer_firstname']) . '" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="lastname">Last name:</label>
                        <input type="text" id="lastname" name="lastname" value="' . htmlspecialchars($row['customer_lastname']) . '" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" value="' . htmlspecialchars($row['customer_email']) . '" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="phonenumber">Phone number:</label>
                        <input type="text" id="phonenumber" name="phonenumber" value="' . htmlspecialchars($row['customer_phonenumber']) . '" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" id="address" name="address" value="' . htmlspecialchars($row['customer_address']) . '" class="form-control">
                    </div>    
                    <div class="list-group mt-5">
                        <div class="list-group-item active">
                            Update your Password here
                        </div>   
                        <br>
                    <div class="form-group">
                        <label for="current_password">Current Password:</label>
                        <input type="password" id="current_password" name="current_password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">New Password (leave blank to keep the same):</label>
                        <input type="password" id="password" name="password" class="form-control">
                    </div>         
                                   
            ';
    
        } else {
            // User does not exist, this should not happen if the user is logged in
            echo "Error: User not found.";
        }            
        
             
    
        $stmt->close();
        $conn->close();
    
        echo '<div class="container" style="margin-top: 20px;">';
    
    
        echo '
        <div class="d-flex">
            <form action="update_user.php" method="post" style="margin-right: 100px;">
                <!-- Rest of the form fields -->
    
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        
        </div> 
        
        ';    
        
    
        //echo '<div class="container" style="margin-top: 10px;">';  
    
            
        echo '   
        
            <div class="container text-center" style="margin-top: 0px;">;  
    
            
            </div>
            
            <form action="logout.php" method="post">
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
            <br>
            ';
            
    
       // echo '<div class="container" style="margin-top: 30px;">';  
    
        echo '     
                
            <form action="delete_user.php" method="post" onsubmit="return confirm(\'Are you sure you want to delete your account? This action cannot be undone.\');">
                 <button type="submit" class="btn btn-danger">Delete Account</button>
            </form>
            ';
            
    
        echo '<div class="container" style="margin-top: 50px;">';  
    
            
           
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

