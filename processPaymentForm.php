<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Process Payment Form</title>

    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>Process Payment Form</header>
    <main>
        <section class="paymentSection">
            <div class="paymentParentContainer">
                <form action="processPaymen.php" method="post">
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
    </main>
</body>

</html>