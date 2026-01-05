<?php
// header.php
// Start session if not already started to check login status
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Get the current page name to highlight the active link
$current_page = basename($_SERVER['PHP_SELF']);
?>
<header>
    <div class="container navbar">
        <div class="nav-logo">
            <a href="homepage.php">
                <img src="images/logo.png" alt="YSA NGO Logo">
                <span>YSA NGO</span>
            </a>
        </div>
        <nav>
            <ul class="nav-links">
                <li><a href="homepage.php" class="<?php echo ($current_page == 'homepage.php') ? 'current' : ''; ?>">Home</a></li>
                <li><a href="about.php" class="<?php echo ($current_page == 'about.php') ? 'current' : ''; ?>">About Us</a></li>
                <li><a href="programs.php" class="<?php echo ($current_page == 'programs.php') ? 'current' : ''; ?>">Programs</a></li>
                
                <?php if (isset($_SESSION['mem_id'])): ?>
                    <li><a href="registration.php" class="<?php echo ($current_page == 'registration.php') ? 'current' : ''; ?>">Register</a></li>
                <?php endif; ?>
                
                <li><a href="donation.php" class="btn btn-secondary">Donate</a></li>
                
                <?php if (isset($_SESSION['mem_id'])): ?>
                    <li><a href="logout.php" class="btn btn-secondary">Logout</a></li>
                <?php else: ?>
                    <li><a href="login.php" class="btn btn-secondary">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>