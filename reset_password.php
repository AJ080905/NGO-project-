<?php
$token = $_GET["token"];
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password - YSA NGO</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <section>
        <div class="container">
             <div class="section-heading"><h2>Choose a New Password</h2></div>
            <div class="form-wrapper">
                <form action="handle_reset_password.php" method="post">
                    <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
                    <div class="form-group">
                        <label for="mem_pass">New Password:</label>
                        <div class="password-wrapper">
                            <input type="password" name="mem_pass" id="mem_pass" required>
                            <img src="images/eye-show.png" class="toggle-password-eye" alt="Show Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mem_pass">Confirm New Password:</label>
                        <div class="password-wrapper">
                            <input type="password" name="mem_pass" id="mem_pass" required>
                            <img src="images/eye-show.png" class="toggle-password-eye" alt="Show Password">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" style="width:100%;">Reset Password</button>
                </form>
            </div>
        </div>
    </section>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const togglePasswordIcons = document.querySelectorAll('.toggle-password');
        togglePasswordIcons.forEach(icon => {
            icon.addEventListener('click', function() {
                const passwordInput = this.previousElementSibling;
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                this.classList.toggle('fa-eye-slash');
            });
        });
    });
    </script>
</body>
</html>