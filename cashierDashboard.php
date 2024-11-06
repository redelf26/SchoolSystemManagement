<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cashier Dashboard</title>

    <link rel="stylesheet" href="styles.css">
    <!-- <script src="https://unpkg.com/html5-qrcode/html5-qrcode.min.js"></script> -->
</head>

<body>
    <aside>
        <nav>
            <div class="userBox">
                <i class="fas fa-user"></i>
                <p>Cashier Name</p>
            </div>
            <ul>
                <li><a href="#paymentForm">Payment Form</a></li>
                <li><a href="#transactions">Transactions</a></li>
                <li><a href="">Logout</a></li>
            </ul>
        </nav>
    </aside>
    <main>
        <section class="paymentSection" id="paymentForm">
            <header>Payment Form</header>

            <div class="paymentParentContainer">
                <form id="dataForm">
                <input type="number" id="referenceIDInput" name="referenceIDInput" placeholder="Scanned QR" autofocus>
                    <label for="studentId">Reference No.:</label>
                    <!-- <input type="number" id="referenceID" name="referenceID" required> -->
                    <span id="referenceID" class="dataField"></span>

                    <label for="studentId">Student ID:</label>
                    <!-- <input type="number" id="studentId" min="0" name="studentId" required> -->
                    <span id="studentID" class="dataField"></span>

                    <label for="paymentAmount">Payment Amount:</label>
                    <!-- <input type="number" id="paymentAmount" min="0" name="paymentAmount" step="0.01" required> -->
                    <span id="paymentAmount" class="dataField"></span>

                    <label for="paymentDetail">Payment Detail:</label>
                    <!-- <select id="paymentDetail" name="paymentDetail" required>
                        <option value="Tuition">Tuition</option>
                        <option value="Uniform">Uniform</option>
                        <option value="Books">Books</option>
                        <option value="Yearbook">Yearbook</option>
                        <option value="DocumentaryStamp">Documentary Stamp</option>
                    </select> -->
                    <span id="paymentDetail" class="dataField"></span>

                    <input type="submit" value="Submit">
                </form>
                <!-- <div id="reader" style="width: 300px;"></div> -->
            </div>
        </section>
    </main>

    <script src="CDscript.js"></script>
</body>

</html>