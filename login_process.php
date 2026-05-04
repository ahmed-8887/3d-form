<?php
session_start();

// Database configuration
// Change these details if your database name or password is different
$host = "localhost";
$username = "root"; // Default XAMPP username
$password = ""; // Default XAMPP password is empty
$database = "3d_form_db"; // Make sure to create this database in phpMyAdmin

// Create database connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error . ". Please make sure you created the database '$database' in XAMPP.");
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Get form data and sanitize it
    $email = $conn->real_escape_string($_POST['email']);
    $pass = $_POST['password']; // In a real app, you should hash passwords and use password_verify()

    // Query to check if user exists
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User found, verify password
        $row = $result->fetch_assoc();
        
        // Note: We are doing a plain text check here for simplicity. 
        // For production, use password_verify($pass, $row['password'])
        if ($pass === $row['password']) {
            $_SESSION['user_email'] = $email;
            header("Location: home.php");
            exit();
        } else {
            echo "<script>alert('Incorrect password!'); window.location.href='login2.html';</script>";
        }
    } else {
        echo "<script>alert('User not found. Please register first.'); window.location.href='login2.html';</script>";
    }
}

$conn->close();
?>
