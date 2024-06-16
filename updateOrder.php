<?php
session_start();
include 'pma.php';
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $orderId = $_POST["OrderId"];
    $employeeId = $_POST["EmployeeId"];
    $date = $_POST["Date"];
    $time = $_POST["Time"];
    $companyName = $_POST["CompanyName"];
    $description = $_POST["Description"];

    $employeeId = $conn->real_escape_string($employeeId);
    $date = $conn->real_escape_string($date);
    $time = $conn->real_escape_string($time);
    $companyName = $conn->real_escape_string($companyName);
    $description = $conn->real_escape_string($description);

    $sql = "UPDATE Zlecenie SET IdPracownika='$employeeId', Data='$date', Czas='$time', NazwaFirmy='$companyName', Opis='$description' WHERE Id='$orderId'";
    if ($conn->query($sql) === TRUE) {
        header("Location: AddOrder.php");
    } else {
        echo "Error updating order: " . $conn->error;
    }
}

$conn->close();
?>
