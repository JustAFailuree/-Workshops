<?php
session_start();
include 'pma.php';
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$orderId = $_POST["OrderId"];
$sql = "SELECT * FROM Zlecenie WHERE Id='$orderId'";
$result = $conn->query($sql);
$order = $result->fetch_assoc();

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Order</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="Order.css">
</head>
<body>
    <section>
        <div class="left">
            <h2>Edit Order:</h2>
            <form method="post" action="updateOrder.php" id="formularz">
                <input type="hidden" id="OrderId" name="OrderId" value="<?php echo $order['Id']; ?>">
                <div>
                    <label for="EmployeeId">Employee ID:</label>
                    <input type="number" id="EmployeeId" name="EmployeeId" value="<?php echo $order['IdPracownika']; ?>">
                </div>
                <div>
                    <label for="Date">Date:</label>
                    <input type="date" max="2044-06-11" id="Date" name="Date" value="<?php echo $order['Data']; ?>">
                </div>
                <div>
                    <label for="Time">Time:</label>
                    <input type="time" id="Time" name="Time" value="<?php echo $order['Czas']; ?>">
                </div>
                <div>
                    <label for="CompanyName">Company Name:</label>
                    <input type="text" id="CompanyName" name="CompanyName" value="<?php echo $order['NazwaFirmy']; ?>">
                </div>
                <div>
                    <label for="Description">Description:</label>
                    <textarea id="Description" name="Description"><?php echo $order['Opis']; ?></textarea>
                </div>
                <button type="submit">Save Order</button>
            </form>
        </div>
    </section>
</body>
</html>
