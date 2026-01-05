<?php
// programs.php
session_start();
if (!isset($_SESSION['mem_id'])) {
    header("Location: login.php");
    exit();
}
include 'db_connect.php';

$programs_sql = "SELECT prog_id, prog_name, prog_desc, prog_image FROM programs";
$programs_result = mysqli_query($conn, $programs_sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Our Programs - YSA NGO</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <section>
        <div class="container section-heading">
            <h2>Our Impactful Programs</h2>
            <p>Creating sustainable change through focused initiatives.</p>
        </div>
    </section>

    <section style="background-color: var(--light-gray-bg);">
        <div class="container">
            <?php
            if (mysqli_num_rows($programs_result) > 0) {
                $counter = 0; 
                while ($row = mysqli_fetch_assoc($programs_result)) {
                    
                    $image_path = 'images/default-program.jpg'; // Default image
                    if (!empty($row['prog_image']) && file_exists('images/programs/' . $row['prog_image'])) {
                        $image_path = 'images/programs/' . htmlspecialchars($row['prog_image']);
                    }
                    
                    $image_block = '<div class="column-image"><img src="' . $image_path . '" alt="' . htmlspecialchars($row['prog_name']) . '"></div>';
                    
                    // Restored the missing text block content
                    $text_block = '
                        <div class="column-text">
                            <h3>' . htmlspecialchars($row['prog_name']) . '</h3>
                            <p>' . htmlspecialchars($row['prog_desc']) . '</p>
                            <a href="registration.php" class="btn btn-secondary">Get Involved</a>
                        </div>';
                    
                    echo '<div class="two-column-layout">';
                    // Restored the alternating layout logic
                    if ($counter % 2 == 0) {
                        echo $image_block . $text_block;
                    } else {
                        echo $text_block . $image_block;
                    }
                    echo '</div>';
                    
                    $counter++;
                }
            } else {
                 echo '<div class="card"><p>No programs have been added yet.</p></div>';
            }
            ?>
        </div>
    </section>
    <?php include 'footer.php'; ?>
</body>
</html>