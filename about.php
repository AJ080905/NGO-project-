<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About Us - YSA NGO</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <?php include 'header.php'; ?>
    
    <section>
        <div class="container section-heading">
             <h2>Our Story</h2>
             <p>Bringing hope and opportunity to communities in Rajkot.</p>
        </div>
    </section>
    
    <section style="background-color: var(--light-gray-bg);">
        <div class="container two-column-layout">
            <div class="column-text">
                <h3>How We Began</h3>
                <p>Founded by a group of passionate volunteers in Rajkot, YSA NGO started as a small community initiative to address local educational disparities. Inspired by the potential in every child, our mission grew from a local effort into a comprehensive organization dedicated to creating lasting change across multiple sectors.</p>
            </div>
            <div class="column-image">
                <img src="images/about.jpg?q=80&w=2071&auto=format&fit=crop" alt="Founders planning">
            </div>
        </div>
    </section>

    <section>
        <div class="container two-column-layout">
            <div class="column-text">
                <h3>Our Mission</h3>
                <p>To empower underprivileged communities by providing access to quality education, essential healthcare, and sustainable development opportunities that foster self-reliance and growth.</p>
            </div>
             <div class="column-text">
                <h3>Our Vision</h3>
                <p>We envision a world where every individual has the opportunity to achieve their fullest potential, contributing to a just, equitable, and thriving society for all.</p>
            </div>
        </div>
    </section>

    <section style="background-color: var(--light-gray-bg);">
        <div class="container">
            <div class="section-heading">
                <h2>Our Core Values</h2>
            </div>
            <div class="three-column-grid" style="grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));">
                <div class="value-card">
                    <i class="fas fa-hands-helping"></i>
                    <h4>Community</h4>
                    <p>We work hand-in-hand with local communities, ensuring our programs are collaborative and meet real needs.</p>
                </div>
                <div class="value-card">
                    <i class="fas fa-seedling"></i>
                    <h4>Sustainability</h4>
                    <p>We focus on long-term solutions that empower individuals and create lasting, positive change.</p>
                </div>
                <div class="value-card">
                    <i class="fas fa-check-circle"></i>
                    <h4>Integrity</h4>
                    <p>We operate with transparency and accountability, ensuring every resource is used effectively for our mission.</p>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="cta-section">
                <h2>Ready to Make a Difference?</h2>
                <p>Your support can change lives. Get involved today by donating or exploring our programs.</p>
                <div>
                    <a href="donation.php" class="btn">Donate Now</a>
                    <a href="programs.php" class="btn">View Programs</a>
                </div>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
</body>
</html>