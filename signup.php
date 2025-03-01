<?php

// Enable error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Database connection
$servername = "localhost";
$username = "";  // MySQL username
$password = "";      // MySQL password (empty if none)
$dbname = "compnet2025";  // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
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
    
    // Get user input
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Basic client-side validation (additional server-side validation is also needed)
    if (empty($username) || empty($email) || empty($password) || empty($confirmPassword)) {
        echo "Please fill in all fields.";
    } elseif ($password !== $confirmPassword) {
        echo "Passwords do not match.";
    } else {
        // Check if the username or email already exists in the database
        $sql = "SELECT * FROM users WHERE username = ? OR email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "Username or Email already exists.";
        } else {
            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insert user data into the database
            $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $username, $email, $hashedPassword);

            if ($stmt->execute()) {
                // Successful account creation, now redirect to login page
                header("Location: login.html");
                exit();  // Ensure no further code is executed after redirect
            } else {
                echo "Error: " . $stmt->error;
            }
        }
    }
}

// Close the connection
$conn->close();
?>
