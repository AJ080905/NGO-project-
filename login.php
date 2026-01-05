<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - YSA NGO</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    </head>
<body>
    <?php include 'header.php'; ?>

    <section>
        <div class="container">
            <div class="section-heading">
                <h2>Member Login</h2>
                <p>Welcome back! Please enter your credentials to access your account.</p>
            </div>

            <div class="form-wrapper">
                <?php
                    if (isset($_GET['error'])) {
                        echo '<div class="alert alert-error">' . htmlspecialchars($_GET['error']) . '</div>';
                    }
                    if (isset($_GET['success'])) {
                        echo '<div class="alert alert-success">' . htmlspecialchars($_GET['success']) . '</div>';
                    }
                ?>
                <form action="handle_login.php" method="post">
                    <div class="form-group">
                        <label for="mem_id">Member ID:</label>
                        <input type="text" name="mem_id" id="mem_id" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="mem_pass">Password:</label>
                        <div class="password-wrapper">
                            <input type="password" name="mem_pass" id="mem_pass" required>
                            <img src="images/eye-show.png" class="toggle-password-eye" alt="Show Password">
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary" style="width:100%;">Login</button>
                    <a href="forgot_password.php" style="display: block; text-align: left; margin-top: 5px;">Forgot Password?</a>
                </form>
                <p style="text-align: center; margin-top: 20px;">New to our NGO? <a href="signup.php">Create an account</a>.</p>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
    <script src="js/main.js"></script>
</body>
</html>