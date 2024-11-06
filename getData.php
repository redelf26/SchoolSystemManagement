<?php
header('Content-Type: application/json');

include 'dbconnection.php';

$referenceID = $_GET['referenceIDInput'] ?? '';

if ($referenceID) {

    $stmt = $conn->prepare("SELECT referenceNumber, studentID, paymentAmount, paymentDetail FROM paymentdetails_tbl WHERE referenceNumber = ?");
    $stmt->bind_param("i", $referenceID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        echo json_encode(['success' => true, 'referenceID' => $data['referenceNumber'], 'studentID' => $data['studentID'], 'paymentAmount' => $data['paymentAmount'], 'paymentDetail' => $data['paymentDetail']]);
    } else {
        echo json_encode(['success' => false, 'message' => 'No data found']);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'No reference ID provided']);
}