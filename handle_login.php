<?php
// handle_login.php
session_start(); // Start the session
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mem_id = mysqli_real_escape_string($conn, $_POST['mem_id']);
    $mem_pass = $_POST['mem_pass'];

    // SQL query to fetch user from database
    $sql = "SELECT * FROM members WHERE mem_id = '$mem_id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        // Verify the password
        if (password_verify($mem_pass, $row['mem_pass'])) {
            // Password is correct, set session variables
            $_SESSION['mem_id'] = $row['mem_id'];
            $_SESSION['mem_nm'] = $row['mem_nm'];
            
            // Redirect to homepage
            header("Location: homepage.php");
            exit();
        } else {
            // Incorrect password
            header("Location: login.php?error=Invalid Member ID or Password.");
            exit();
        }
    } else {
        // No user found
        header("Location: login.php?error=Invalid Member ID or Password.");
        exit();
    }
}

mysqli_close($conn);
?>