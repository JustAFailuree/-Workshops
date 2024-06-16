<?php
session_start();
include 'pma.php';
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $orderId = $_POST["OrderId"];

    $sql = "DELETE FROM Zlecenie WHERE Id='$orderId'";
    if ($conn->query($sql) === TRUE) {
        header("Location: AddOrder.php");
    } else {
        echo "Error deleting order: " . $conn->error;
    }
}

$conn->close();
?>
