<?php
            include 'pma.php';
            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $id = $_POST['ID'];
            $imie = $_POST['Imie'];
            $nazwisko = $_POST['Nazwisko'];
            $wiek = $_POST['Wiek'];
            $telefon = $_POST['Telefon'];
            $Email = $_POST['Mail'];
            $rola = $_POST['Role'];
            $nick = $_POST['Nick'];
            $haslo = $_POST['Pass'];

            $id = $conn->real_escape_string($id);
            $imie = $conn->real_escape_string($imie);
            $nazwisko = $conn->real_escape_string($nazwisko);
            $wiek = $conn->real_escape_string($wiek);
            $telefon = $conn->real_escape_string($telefon);
            $Email = $conn->real_escape_string($Email);
            $rola = $conn->real_escape_string($rola);
            $nick = $conn->real_escape_string($nick);
            $haslo = $conn->real_escape_string($haslo);

            $hashed = password_hash($haslo, PASSWORD_DEFAULT);

        
              $check_sql = "SELECT Id, Nazwa FROM pracownicy WHERE Id = '$id' OR Nazwa = '$nick'";
            $result = $conn->query($check_sql);

            if ($result->num_rows > 0) {
                echo "<script>alert('Duplicate Id or Nick found'); window.location.href='Index.php';</script>";
                header("Location: Index.php");
            } else {
                $sql = "INSERT INTO pracownicy (Id, Imie, Nazwisko, Wiek, Telefon, Email, Rola, Nazwa, Haslo) VALUES ('$id', '$imie', '$nazwisko', '$wiek', '$telefon', '$Email', '$rola', '$nick', '$hashed')";
                if ($conn->query($sql) === TRUE) {
                    echo "<script>alert('New employee added successfully'); window.location.href='Index.php';</script>";
                } else {
                   
                }
            }
        }
        $conn->close();
        ?>