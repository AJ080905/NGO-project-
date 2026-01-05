<?php 
session_start(); 

// Get member details if logged in, otherwise use empty strings
$memberID = isset($_SESSION['mem_id']) ? htmlspecialchars($_SESSION['mem_id']) : '';
$memberName = isset($_SESSION['mem_nm']) ? htmlspecialchars($_SESSION['mem_nm']) : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Donate - YSA NGO</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'header.php'; ?>
    
    <section>
        <div class="container">
            <div class="section-heading">
                <h2>Support to make a change</h2>
                <p>Every contribution makes a difference in someone's life.</p>
            </div>
            
            <div class="form-wrapper">
                <div class="qr-code-container">
                    <h3>1. Scan to Pay Online</h3>
                    <p>Use any payment app to scan the QR code below.</p>
                    <img src="images/payment.jpg" alt="Scan to Pay QR Code">
                </div>

                <h3>2. Record Your Contribution</h3>
                <p>After your payment is successful, please fill out this form so we can keep a record and send you the payment receipt.</p>

                <?php
                    if (isset($_GET['success'])) {
                        echo '<div class="alert alert-success">' . htmlspecialchars($_GET['success']) . '</div>';
                    }
                     if (isset($_GET['error'])) {
                        echo '<div class="alert alert-error">' . htmlspecialchars($_GET['error']) . '</div>';
                    }
                ?>

                <form action="handle_donation.php" method="POST">
                    
                    <?php if (!empty($memberName)): ?>
                        <div class="form-group">
                            <label>Full Name</label>
                            <p class="form-static-text"><?php echo $memberName; ?></p>
                            <input type="hidden" name="donor_name" value="<?php echo $memberName; ?>">
                        </div>
                    <?php else: ?>
                        <div class="form-group">
                            <label for="donor_name">Full Name</label>
                            <input type="text" name="donor_name" id="donor_name" value="" required>
                        </div>
                    <?php endif; ?>


                    <?php if (!empty($memberID)): ?>
                        <div class="form-group">
                            <label>Member ID</label>
                            <p class="form-static-text"><?php echo $memberID; ?></p>
                            <input type="hidden" name="mem_id" value="<?php echo $memberID; ?>">
                        </div>
                    <?php else: ?>
                        <input type="hidden" name="mem_id" value="">
                    <?php endif; ?>

                     <div class="form-group">
                        <label for="amount">Donation Amount (₹)</label>
                        <input type="number" name="amount" id="amount" step="0.01" placeholder="e.g., 50.00" required>
                    </div>
                    <div class="form-group">
                        <label for="dn_txn_id">Transaction ID (from your payment app)</label>
                        <input type="text" name="dn_txn_id" id="dn_txn_id" required>
                    </div>

                    <button type="submit" class="btn btn-primary" style="width:100%;">Submit Donation Record</button>
                </form>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
</body>
</html>