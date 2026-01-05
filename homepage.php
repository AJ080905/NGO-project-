<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome - YSA NGO</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <section class="hero">
        <div class="container">
            <div class="hero-text">
                <h1>Bringing Smiles to Every Community</h1>
                <p>Join us in our mission to create lasting positive change through education, healthcare, and community development.</p>
                <a href="about.php" class="btn btn-primary">Learn More</a>
            </div>
            <div class="hero-image">
                <img src="images/make1.jpg?q=80&w=2070&auto=format&fit=crop" alt="Children smiling">
            </div>
        </div>
    </section>

    <section>
        <div class="container section-heading">
            <h2>Our Mission</h2>
            <p style="max-width: 800px; margin: 0 auto;">To empower underprivileged communities by providing access to quality education, healthcare, and sustainable development opportunities.</p>
        </div>
    </section>

    <section style="background-color: var(--light-gray-bg);">
        <div class="container">
            <div class="section-heading">
                <h2>Our Programs</h2>
            </div>
            <div class="three-column-grid">
                <div class="program-card">
                    <img src="images/edu.jfif?q=80&w=2070&auto=format&fit=crop" alt="Education">
                    <div class="program-card-content">
                        <h3>Education Initiative</h3>
                        <p>Providing quality education to children in underserved communities.</p>
                    </div>
                </div>
                <div class="program-card">
                    <img src="images/healthcare.jpg?q=80&w=2070&auto=format&fit=crop" alt="Healthcare">
                    <div class="program-card-content">
                        <h3>Healthcare Access</h3>
                        <p>Essential healthcare services to remote areas.</p>
                    </div>
                </div>
                <div class="program-card">
                    <img src="images/community.jpg?q=80&w=2070&auto=format&fit=crop" alt="Community">
                    <div class="program-card-content">
                        <h3>Community Development</h3>
                        <p>Building sustainable infrastructure and economic opportunities.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
</body>
</html>