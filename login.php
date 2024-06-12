<?php

include 'pma.php';
$login = $_POST['Login'];
$haslo = $_POST['Pass'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Id,Nazwa, Haslo, Rola FROM pracownicy WHERE Nazwa = '$login' AND Haslo = '$haslo'";
            $result = $conn->query($sql);

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                $_SESSION['role'] = $row['Rola'];
                $_SESSION['id'] = $row['Id'];
                echo '<script> console.log("zalogowano") </script>';
                header('Location: Grafik.php');
                exit();
            } else {
        
                echo '<script> console.log("Błędne dane logowania!")</script>';
            }
            $conn->close();
?>