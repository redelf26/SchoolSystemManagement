<?php
include 'dbconnection.php';

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query to fetch payment data
    $stmt = $pdo->query("SELECT referenceNumber, paymentDetail, paymentAmount, paymentDateTime, paymentStatus FROM paymentdetails_tbl ORDER BY paymentDateTime DESC");
    $payments = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
