<?php
// handle_registration.php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['mem_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // mem_id is taken from session for security, not from the form directly.
    $mem_id = $_SESSION['mem_id']; 
    $prog_id = mysqli_real_escape_string($conn, $_POST['prog_id']);

    // Check if user is already registered for this program
    $check_sql = "SELECT * FROM registrations WHERE mem_id = '$mem_id' AND prog_id = '$prog_id'";
    $check_result = mysqli_query($conn, $check_sql);
    if(mysqli_num_rows($check_result) > 0) {
        header("Location: registration.php?error=You are already registered for this program.");
        exit();
    }

    // Insert the registration
    $sql = "INSERT INTO registrations (mem_id, prog_id) VALUES ('$mem_id', '$prog_id')";

    if (mysqli_query($conn, $sql)) {
        header("Location: registration.php?success=You have been successfully registered for the program!");
        exit();
    } else {
        header("Location: registration.php?error=An error occurred. Please try again.");
        exit();
    }
}
mysqli_close($conn);
?>