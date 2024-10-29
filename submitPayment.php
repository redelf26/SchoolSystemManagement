<?php
include 'dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $studentId = $_POST['studentId'];
    $paymentAmount = $_POST['paymentAmount'];
    $paymentDetail = $_POST['paymentDetail'];

    $referenceNumber = random_int(10000000, 99999999);

    // Prepare an SQL statement with placeholders
    $stmt = $conn->prepare("INSERT INTO paymentdetails_tbl (referenceNumber,studentID, paymentAmount, paymentDetail,paymentDateTime) VALUES (?,?, ?, ?,NOW())");

    // Bind the variables to the statement
    $stmt->bind_param("iids",$referenceNumber, $studentId, $paymentAmount, $paymentDetail);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Payment record inserted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
}

$conn->close();
?>