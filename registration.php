<?php
// registration.php
session_start();

if (!isset($_SESSION['mem_id'])) {
    header("Location: login.php");
    exit();
}

include 'db_connect.php';

$memberID = $_SESSION['mem_id'];

$programs_sql = "SELECT prog_id, prog_name FROM programs ORDER BY prog_name";
$programs_result = mysqli_query($conn, $programs_sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Program Registration - YSA NGO</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <section>
        <div class="container">
            <div class="section-heading">
                <h2>Register for a Program</h2>
                <p>Join one of our initiatives and be a part of the change.</p>
            </div>

            <div class="form-wrapper">
                
                <?php
                    if (isset($_GET['success'])) {
                        echo '<div class="alert alert-success">' . htmlspecialchars($_GET['success']) . '</div>';
                    }
                    if (isset($_GET['error'])) {
                        echo '<div class="alert alert-error">' . htmlspecialchars($_GET['error']) . '</div>';
                    }
                ?>

                <form action="handle_registration.php" method="post">
                    
                    <div class="form-group">
                        <label>Your Member ID:</label>
                        <p class="form-static-text"><?php echo htmlspecialchars($memberID); ?></p>
                        <input type="hidden" name="mem_id" value="<?php echo htmlspecialchars($memberID); ?>">
                    </div>

                    <div class="form-group">
                        <label for="prog_id">Choose a Program:</label>
                        <select name="prog_id" id="prog_id" required>
                            <option value="" disabled selected>-- Select a Program --</option>
                            <?php
                                if (mysqli_num_rows($programs_result) > 0) {
                                    while($row = mysqli_fetch_assoc($programs_result)) {
                                        echo '<option value="' . $row['prog_id'] . '">' . htmlspecialchars($row['prog_name']) . '</option>';
                                    }
                                }
                            ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary" style="width:100%;">Register Now</button>
                </form>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
</body>
</html>