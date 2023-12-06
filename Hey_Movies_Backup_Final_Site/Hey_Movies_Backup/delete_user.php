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

    // Check that the session email is set and is not empty
    if (!isset($_SESSION['customer_email']) || empty($_SESSION['customer_email'])) {
        echo "Error: No user is logged in.";
        exit();
    }

    // SQL query to delete the user's account
    $sql = "DELETE FROM customerinformation WHERE customer_email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_SESSION['customer_email']);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        // Deletion was successful, end the user's session
        session_unset();
        session_destroy();
        // Redirect to a page informing the user that their account has been deleted
        header('Location: account_deleted.php');
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
?>