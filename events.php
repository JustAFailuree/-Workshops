<?php
session_start();
header('Content-Type: application/json');

include 'pma.php'; 
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$events = [];

if ($_SESSION["role"] === "A") {
    $sql = "SELECT zlecenie.Data, zlecenie.Czas, zlecenie.Opis, zlecenie.NazwaFirmy, pracownicy.Imie, pracownicy.Nazwisko FROM zlecenie INNER JOIN pracownicy ON zlecenie.IdPracownika=pracownicy.Id";
} elseif ($_SESSION["role"] === "P") {
    $employeeId = $_SESSION["id"];
    $sql = "SELECT zlecenie.Data, zlecenie.Czas, zlecenie.Opis, zlecenie.NazwaFirmy, pracownicy.Imie, pracownicy.Nazwisko FROM zlecenie INNER JOIN pracownicy ON zlecenie.IdPracownika=pracownicy.Id WHERE IdPracownika = '$employeeId'";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $events[] = [
            'title' => $row["Imie"]. " ".$row["Nazwisko"],
            'start' => $row["Data"] . "T" . date("H:i", strtotime($row["Czas"])),
        
                'description' => "Comapny: " . $row["NazwaFirmy"] . "<br>Description: " . $row["Opis"] 
            
        ];
    }
}

$conn->close();
echo json_encode($events);
?>
