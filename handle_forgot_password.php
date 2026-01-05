<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["mem_email"];

    $stmt = $conn->prepare("SELECT mem_id FROM members WHERE mem_email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user === null) {
        die("User with that email not found.");
    }

    $token = bin2hex(random_bytes(16));
    $token_hash = hash("sha256", $token);
    $expiry = date("Y-m-d H:i:s", time() + 60 * 15); // 15 minutes from now

    $stmt = $conn->prepare("UPDATE members SET reset_token_hash = ?, reset_token_expires_at = ? WHERE mem_email = ?");
    $stmt->bind_param("sss", $token_hash, $expiry, $email);
    $stmt->execute();

    // --- In a real application, you would email this link ---
    // $reset_link = "http://yourwebsite.com/reset_password.php?token=$token";
    // mail($email, "Password Reset", "Click here to reset your password: $reset_link");

    // --- For local testing, we will display the link directly ---
    echo "Password reset link has been generated. <br>";
    echo "<strong>NOTE:</strong> In a live website, this link would be emailed to you. For this demo, please click the link below to proceed.<br><br>";
    echo '<a href="reset_password.php?token=' . $token . '">Click here to reset your password</a>';
}
?>