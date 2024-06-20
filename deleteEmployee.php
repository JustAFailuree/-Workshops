<?php
        include 'pma.php';

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $id = $_POST['ID2'];

            $id = $conn->real_escape_string($id);

            $sql_del = "DELETE FROM pracownicy WHERE Id = '$id'";
            $result = $conn->query($sql_del);

            if ($result === TRUE) {
                echo "<script>alert('User deleted successfully!'); window.location.href='Index.php';</script>";
            } else {
                echo "<script>alert('User could not be deleted!'); window.location.href='Index.php';</script>";
            }
        

            $conn->close();
        }
?>
