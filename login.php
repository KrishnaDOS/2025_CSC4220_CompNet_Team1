<?php

// Enable error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Set up MySQL connection (without username and password)
$servername = "localhost";  // Use localhost if MySQL is on the same server
$dbname = "compnet2025";  // Your database name

// Create connection (no username and password)
$conn = new mysqli($servername, "", "", $dbname); // Username and password are empty

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $recaptcha_secret = "6LekueUqAAAAANL0X5dtRConj9ZCULzncfZT9-Ig";
    $recaptcha_response = $_POST['g-recaptcha-response'];

    $verify_response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$recaptcha_secret.'&response='.$recaptcha_response);
    $response_data = json_decode($verify_response);

    if (!$response_data->success) {
        die("reCAPTCHA verification failed. Please try again.");
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "Form submitted successfully";
        var_dump($_POST);  // This will display all POST data
    } else {
        echo "No form submission detected";
    }
    

    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Simple input validation
    if (empty($user) || empty($pass)) {
        echo "Please fill in all fields.";
    } else {
        // Check if user exists in the database
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $user);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Verify password (compare the hash in the database with the entered password)
            if (password_verify($pass, $row['password'])) {
                echo "Login successful!";
                header("Location: index.html");
                exit();
            } else {
                echo "Invalid password.";
            }
        } else {
            echo "No user found with that username.";
        }
    }
}

$conn->close();
?>
