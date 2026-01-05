<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password - YSA NGO</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <section>
        <div class="container">
            <div class="section-heading">
                <h2>Reset Your Password</h2>
                <p>Enter the email address associated with your account.</p>
            </div>
            <div class="form-wrapper">
                <form action="handle_forgot_password.php" method="post">
                    <div class="form-group">
                        <label for="mem_email">Your Email Address:</label>
                        <input type="email" name="mem_email" id="mem_email" required>
                    </div>
                    <button type="submit" class="btn btn-primary" style="width:100%;">Send Reset Link</button>
                </form>
            </div>
        </div>
    </section>
    <?php include 'footer.php'; ?>
</body>
</html>