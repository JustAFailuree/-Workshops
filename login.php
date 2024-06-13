<?php
session_start();
include 'pma.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['Login'];
    $haslo = $_POST['Pass'];

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT Nazwa, Haslo, Rola, Id FROM pracownicy WHERE Nazwa = '$login'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $verify = password_verify($haslo, $row['Haslo']);

        if ($verify) {
            $_SESSION['role'] = $row['Rola'];
            $_SESSION['id'] = $row['Id'];
            header('Location: Grafik.php');
            exit();
        } else {
            echo "<script> alert('Błędne dane logowania'); window.location.href='Start.php'; </script>";
        }
    } else {
        echo "<script> alert('Błędne dane logowania'); window.location.href='Start.php'; </script>";
    }

    $conn->close();
}
?>
