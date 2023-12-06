<?php
  session_start();


  // Check if the request is a POST request
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Database connection details
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

      // Retrieve user input
      $customer_email = $_POST["customer_email"];
      $Customer_password = $_POST["Customer_password"];

      // Prepare and execute a query to check user credentials
      $stmt = $conn->prepare("SELECT Customer_ID, customer_firstname, Customer_password FROM customerinformation WHERE customer_email = ?");
      $stmt->bind_param("s", $customer_email);
      $stmt->execute();
      $stmt->store_result();
      $stmt->bind_result($Customer_ID, $customer_email, $db_Customer_password);
      
      if ($stmt->num_rows == 1 && password_verify($Customer_password, $Customer_password)) {
          $_SESSION['Customer_ID'] = $Customer_ID; // Store the user's ID in the session
          echo "success";
      } else {
          echo "failed";
      }
      
      $stmt->close();
      $conn->close();
  }       
?>