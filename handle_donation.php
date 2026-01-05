<?php
// handle_donation.php (Final Version)
session_start();
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $donor_name = trim($_POST['donor_name']);
    $amount = $_POST['amount'];
    $dn_txn_id = trim($_POST['dn_txn_id']);
    
    // ==> START: NEW LOGIC FOR MEMBER ID <==
    // Prioritize the logged-in user's session ID.
    if (isset($_SESSION['mem_id']) && !empty($_SESSION['mem_id'])) {
        // If the user is logged in, use their session ID directly.
        $mem_id = $_SESSION['mem_id'];
    } else {
        // If they are a guest, check if they manually entered an ID.
        $mem_id = !empty(trim($_POST['mem_id'])) ? trim($_POST['mem_id']) : NULL;
    }
    // ==> END: NEW LOGIC FOR MEMBER ID <==

    // If a member ID exists (either from session or manual input), validate it.
    if ($mem_id !== NULL) {
        $check_mem_stmt = $conn->prepare("SELECT mem_id FROM members WHERE mem_id = ?");
        $check_mem_stmt->bind_param("s", $mem_id);
        $check_mem_stmt->execute();
        $check_mem_stmt->store_result();

        if ($check_mem_stmt->num_rows == 0) {
            header("Location: donation.php?error=Invalid Member ID. Please check the ID or leave the field blank.");
            $check_mem_stmt->close();
            $conn->close();
            exit();
        }
        $check_mem_stmt->close();
    }

    // Check if transaction ID already exists
    $check_txn_stmt = $conn->prepare("SELECT dn_no FROM donations WHERE dn_txn_id = ?");
    $check_txn_stmt->bind_param("s", $dn_txn_id);
    $check_txn_stmt->execute();
    $check_txn_stmt->store_result();

    if($check_txn_stmt->num_rows > 0) {
        header("Location: donation.php?error=This Transaction ID has already been recorded.");
        $check_txn_stmt->close();
        $conn->close();
        exit();
    }
    $check_txn_stmt->close();

    // All checks passed, proceed with insertion
    $stmt = $conn->prepare("INSERT INTO donations (donor_name, mem_id, amount, dn_txn_id) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssds", $donor_name, $mem_id, $amount, $dn_txn_id);

    if ($stmt->execute()) {
        header("Location: donation.php?success=Donation recorded successfully. Thank you!");
    } else {
        header("Location: donation.php?error=An error occurred. Please try again.");
    }

    $stmt->close();
    $conn->close();
}
?>