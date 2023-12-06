

<?php

  session_start();

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

  if (isset($_POST['submit'])) {
    $customer_firstname = $_POST['customer_firstname'];
    $customer_lastname = $_POST['customer_lastname'];
    $customer_email = $_POST['customer_email'];
    $customer_phonenumber = $_POST['customer_phonenumber'];
    $customer_address = $_POST['customer_address'];
    $Customer_password = $_POST['Customer_password'];

    $hash = password_hash($Customer_password, PASSWORD_DEFAULT); // Hashes the password  

    // Insert data into database
    $stmt = $conn->prepare("INSERT INTO customerinformation (customer_firstname, customer_lastname, customer_email, customer_phonenumber, customer_address, Customer_password) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $customer_firstname, $customer_lastname, $customer_email, $customer_phonenumber, $customer_address, $hash);
    
    if ($stmt->execute()) {
        $_SESSION['message'] = 'Registration successful!';
        // Redirect to index.php
        header("Location: loginform.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
  }  
    
$stmt->close();
?>
