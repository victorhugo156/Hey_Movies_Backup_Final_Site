<?php   
    session_start();

    if (isset($_SESSION['customer_email'])) {
        // User is already logged in, redirect to the dashboard
       // header('Location: userdashboard.php');
        //exit();
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




    if (isset($_POST['current_password']) && isset($_POST['new_password'])) {
        $current_password = $_POST['current_password'];
        $new_password = $_POST['new_password'];

        // Query the database
        $sql = "SELECT * FROM customerinformation WHERE customer_email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $_SESSION['customer_email']);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($user = $result->fetch_assoc()) {
            // User exists, now check password
            if (password_verify($current_password, $user['Customer_password'])) {
                // Password is correct, hash the new password
                $new_password_hashed = password_hash($new_password, PASSWORD_DEFAULT);
        
                // Update the password in the database
                $sql = "UPDATE customerinformation SET Customer_password = ? WHERE customer_email = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ss", $new_password_hashed, $_SESSION['customer_email']);
                $stmt->execute();
        
                // Store the confirmation message in the session
                $_SESSION['message'] = "Password updated successfully.";
        
                // Redirect the user to the dashboard
                header('Location: userdashboard.php');
                exit();
            } else {
                // Password is incorrect
                echo "Current password is incorrect.";
            }
        } else {
            // User does not exist
            echo "User does not exist.";
        }
    }    
?>