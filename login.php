<?php

include 'pma.php';
$login = $_POST['Login'];
$haslo = $_POST['Pass'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$sql = "SELECT Nazwa, Haslo, Rola, Id FROM pracownicy WHERE Nazwa = '$login'";

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $verify = password_verify($haslo, $row['Haslo']);

    if ($verify) {
        $row = $result->fetch_assoc();
        $_SESSION['role'] = $row['Rola'];
        $_SESSION['id'] = $row['Id'];
        header('Location: Grafik.php');
        exit();
    } else {
        echo "<script> alert('Błędne dane logowania')</script>";
    }
    $conn->close();
?>
