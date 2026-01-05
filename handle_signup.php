<?php
// handle_signup.php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mem_nm = mysqli_real_escape_string($conn, $_POST['mem_nm']);
    $mem_email = mysqli_real_escape_string($conn, $_POST['mem_email']);
    $mem_id = mysqli_real_escape_string($conn, $_POST['mem_id']);
    $mem_pass = $_POST['mem_pass'];

    // --- Validation ---
    // Check if mem_id or email already exists
    $check_sql = "SELECT * FROM members WHERE mem_id = '$mem_id' OR mem_email = '$mem_email'";
    $check_result = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($check_result) > 0) {
        header("Location: signup.php?error=Member ID or Email already exists.");
        exit();
    }

    // Hash the password for security
    $hashed_pass = password_hash($mem_pass, PASSWORD_DEFAULT);

    // Insert new member into the database
    $sql = "INSERT INTO members (mem_id, mem_nm, mem_email, mem_pass) VALUES ('$mem_id', '$mem_nm', '$mem_email', '$hashed_pass')";

    if (mysqli_query($conn, $sql)) {
        header("Location: login.php?success=Account created successfully! Please login.");
        exit();
    } else {
        header("Location: signup.php?error=Something went wrong. Please try again.");
        exit();
    }
}

mysqli_close($conn);
?>