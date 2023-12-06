<?php 

    session_start();

    if (isset($_SESSION['customer_email'])) {
        // User is already logged in, redirect to the dashboard
        header('Location: userdashboard.php');
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

        // Get the form data
        $customer_email = $_POST['customer_email'];
        $Customer_password = $_POST['Customer_password'];
    
        // Query the database
        $sql = "SELECT * FROM customerinformation WHERE customer_email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $customer_email);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($row = $result->fetch_assoc()) {
            // User exists, verify the password
            if (password_verify($Customer_password, $row['Customer_password'])) {
                // Login successful
                session_start();
                $_SESSION['customer_email'] = $customer_email;
                header('Location: userdashboard.php');
            } else {
                // Password incorrect
                session_start();
                $_SESSION['error'] = "Login failed. Please check your credentials.";
                header('Location: loginform.php');
            }
        } else {
            // User does not exist
            session_start();
            $_SESSION['error'] = "Login failed. Please check your credentials.";
            header('Location: loginform.php');
        }
    
        $stmt->close();
        $conn->close();
    ?>
?>
