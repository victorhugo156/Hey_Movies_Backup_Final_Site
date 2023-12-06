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

    // Check if form data is received
    if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['phonenumber']) && isset($_POST['address'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $phonenumber = $_POST['phonenumber'];
        $address = $_POST['address'];
        

        // Check if password field is not empty
        if (!empty($_POST['password'])) {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            // Update the user's information in the database including password
            $sql = "UPDATE customerinformation SET customer_firstname = ?, customer_lastname = ?, customer_email = ?, customer_phonenumber = ?, customer_address = ?, customer_password = ? WHERE customer_email = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssss", $firstname, $lastname, $email, $phonenumber, $address, $password, $_SESSION['customer_email']);
        } else {
            // Update the user's information in the database without password
            $sql = "UPDATE customerinformation SET customer_firstname = ?, customer_lastname = ?, customer_email = ?, customer_phonenumber = ?, customer_address = ? WHERE customer_email = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssss", $firstname, $lastname, $email, $phonenumber, $address, $_SESSION['customer_email']);
        }

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            // Update was successful, store the success message in the session
            $_SESSION['message'] = "Information updated successfully.";
            // Update the email in the session if it was changed
            $_SESSION['customer_email'] = $email;
        } else {
            // No rows were affected, so either the update failed or the user's information didn't change
            $_SESSION['message'] = "No changes were made.";
        }

        // Redirect the user to the dashboard
        header('Location: userdashboard.php');
        exit();
    } else {
        echo "Form data not received.";
    }
?>