<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $token = $_POST["token"];
    $token_hash = hash("sha256", $token);

    include 'db_connect.php';

    $stmt = $conn->prepare("SELECT * FROM members WHERE reset_token_hash = ?");
    $stmt->bind_param("s", $token_hash);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user === null || strtotime($user["reset_token_expires_at"]) <= time()) {
        die("Link has expired or is invalid.");
    }
    
    if ($_POST["password"] !== $_POST["password_confirmation"]) {
        die("Passwords must match.");
    }

    $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("UPDATE members SET mem_pass = ?, reset_token_hash = NULL, reset_token_expires_at = NULL WHERE mem_id = ?");
    $stmt->bind_param("ss", $password_hash, $user["mem_id"]);
    $stmt->execute();

    header("Location: login.php?success=Password updated successfully. You can now log in.");
    exit;
}
?>