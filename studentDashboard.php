<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>

    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

</head>

<body>
    <aside>
        <nav>
            <div class="userBox">
                <i class="fas fa-user"></i>
                <p>Student Name</p>
            </div>
            <ul>
                <li><a href="#paymentForm">Payment Form</a></li>
                <li><a href="#viewPayment">View Payments</a></li>
                <li><a href="">Logout</a></li>
            </ul>
        </nav>
    </aside>
    <main>
        <section class="paymentSection" id="paymentForm">
            <header>Payment Form</header>

            <div class="paymentParentContainer">
                <form action="submitPayment.php" method="post">
                    <label for="studentId">Student ID:</label>
                    <input type="number" id="studentId" min="0" name="studentId" required>

                    <label for="paymentAmount">Payment Amount:</label>
                    <input type="number" id="paymentAmount" min="0" name="paymentAmount" step="0.01" required>

                    <label for="paymentDetail">Payment Detail:</label>
                    <select id="paymentDetail" name="paymentDetail" required>
                        <option value="Tuition">Tuition</option>
                        <option value="Uniform">Uniform</option>
                        <option value="Books">Books</option>
                        <option value="Yearbook">Yearbook</option>
                        <option value="DocumentaryStamp">Documentary Stamp</option>
                    </select>

                    <input type="submit" value="Submit">
                </form>
            </div>
        </section>

        <section class="viewPayment" id="viewPayment">
            <header>View Payment</header>

            <table>
                <thead>
                    <th>Reference No.</th>
                    <th>Detail</th>
                    <th>Amount</th>
                    <th>Timestamp</th>
                    <th>Status</th>
                    <th>QR</th>
                </thead>
                <tbody>
                    <?php
                    include 'fetchPayments.php';

                    foreach ($payments as $payment) {
                        echo "<tr>
                                    <td>{$payment['referenceNumber']}</td>
                                    <td>{$payment['paymentDetail']}</td>
                                    <td>{$payment['paymentAmount']}</td>
                                    <td>{$payment['paymentDateTime']}</td>
                                    <td>{$payment['paymentStatus']}</td>
                                    <td><button id='generateQR-{$payment['referenceNumber']}' data-reference='{$payment['referenceNumber']}'>Generate QR</button></td>
                                </tr>
                            ";
                    }
                    ?>
                </tbody>
            </table>
            <dialog id="modal" class="modal">
                <div class="modal-content">
                    <button id="close" onclick="closeDialog()">&times;</button>
                    <div id="qrcode"></div>
                    <p id="selectedReference"></p>
                </div>
            </dialog>
        </section>
    </main>

    <script src="script.js"></script>
</body>

</html>