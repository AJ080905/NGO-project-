<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up - YSA NGO</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <section>
        <div class="container">
            <div class="section-heading">
                <h2>Create an Account</h2>
                <p>Join our community to make a difference.</p>
            </div>

            <div class="form-wrapper">
                <div id="error-message"></div> <?php
                    if (isset($_GET['error'])) {
                        echo '<div class="alert alert-error">' . htmlspecialchars($_GET['error']) . '</div>';
                    }
                ?>
                <form id="signup-form" action="handle_signup.php" method="post">
                    <div class="form-group">
                        <label for="mem_nm">Full Name:</label>
                        <input type="text" name="mem_nm" id="mem_nm" required>
                    </div>
                    <div class="form-group">
                        <label for="mem_email">Email ID:</label>
                        <input type="email" name="mem_email" id="mem_email" required>
                    </div>
                    <div class="form-group">
                        <label for="mem_id">Member ID (Alphanumeric):</label>
                        <input type="text" name="mem_id" id="mem_id" pattern="[a-zA-Z0-9]+" title="Only letters and numbers are allowed" required>
                    </div>
                    <div class="form-group">
                        <label for="mem_pass">Password (min. 8 characters):</label>
                        <div class="password-wrapper">
                            <input type="password" name="mem_pass" id="mem_pass" required>
                            <img src="images/eye-show.png" class="toggle-password-eye" alt="Show Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mem_pass">Confirm Password:</label>
                        <div class="password-wrapper">
                            <input type="password" name="mem_pass" id="mem_pass" required>
                            <img src="images/eye-show.png" class="toggle-password-eye" alt="Show Password">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" style="width:100%;">Sign Up</button>
                </form>
                 <p style="text-align: center; margin-top: 20px;">Already have an account? <a href="login.php">Login here</a>.</p>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
    <script src="js/main.js"></script>
</body>
</html>