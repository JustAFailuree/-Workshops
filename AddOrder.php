<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new order</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="Order.css">
</head>
<body>
<nav>
            <div class="NavLeft">
                <a href="Grafik.php">Schedule</a>
                <?php
                if ($_SESSION["role"] === "A") { ?>
                <a href="AddOrder.php">Add new order</a>
                <a href="Index.php">Add new employee</a>
                <?php } ?>
            </div>
            <div class="NavRight">
                <a href="logout.php">Logout</a>
            </div>

            <div id="mySidebar" class="sidebar">
                <a href="#" class="closebtn" onclick="closeNav()">&times;</a>
                <?php
                    if ($_SESSION["role"] === "A") { ?>
                    <a href="AddOrder.php">Add new order</a>
                    <a href="Index.php">Add new employee</a>
                    <a href="logout.php">Logout</a>
                    <?php } ?>
                    <?php
                    if ($_SESSION["role"] === "P") { ?>
                    <a href="logout.php">Logout</a>
                    <?php } ?>
            </div>
          <div id="main">
            <button class="openbtn" onclick="openNav()">&#9776; Open MENU</button>
          </div>

        </nav>
    <section>
        <div class="left">
        <h2>Order form:</h2>
        <form method="post" id="formularz">
            <div>
                <label for="EmployeeId">Employee ID:</label>
                <input type="number" id="EmployeeId" name="EmployeeId">
            </div>
            <div>
                <label for="Date">Data:</label>
                <input type="date" max="2044-06-11" id="Date" name="Date">
            </div>
            <div>
                <label for="Time">Time:</label>
                <input type="time" id="Time" name="Time">
            </div>
            <div>
                <label for="CompanyName">Company Name:</label>
                <input type="text" id="CompanyName" name="CompanyName">
            </div>
            <div>
                <label for="Description">Description:</label>
                <textarea id="Description" name="Description"></textarea>
            </div>
            <button type="submit">Add Order</button>
            <script>
               document.getElementById('formularz').addEventListener('submit',function(event)
                {
                    var id = document.getElementById('EmployeeId').value;
                    var data = document.getElementById('Date').value;
                    var czas = document.getElementById('Time').value;
                    var nazwa = document.getElementById('CompanyName').value;
                    var opis = document.getElementById('Description').value;
                
                    if(id == '' || data == '' || czas == '' || nazwa == '' || opis =='')
                    {
                        event.preventDefault();
                        alert('Fill in all fields');
                    }
                    else
                    {
                        if(id < 1)
                        {
                            alert('Id cannot be less than 1');
                        }
                        else{
                            alert('Order added');
                        }
                    }
                });

                
                function ustawMinDate()
                {
                    var data = new Date();
                    var dzien = String(data.getDate()).padStart(2,'0');
                    var miesiac = String(data.getMonth() + 1).padStart(2,'0');
                    var rok = data.getFullYear();

                    var dataSformatowana = rok + "-" + miesiac + "-" + dzien;
                    console.log(dataSformatowana);

                    document.getElementById("Date").setAttribute('min',dataSformatowana);
                }
                window.onload = ustawMinDate;
            </script>
        </form>
        <?php
        include 'pma.php';
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
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

            
            $sql = "INSERT INTO Zlecenie (IdPracownika, Data, Czas, NazwaFirmy, Opis) 
                    VALUES ('$employeeId', '$date', '$time', '$companyName', '$description')";
                    if ($conn->query($sql) === TRUE){
                        
                    }
                    
        }

        $conn->close();
        ?>
        </div>
        <div class="right">
            <?php
                include 'pma.php';
                $conn = new mysqli($servername, $username, $password, $dbname);

                $sql = "SELECT Id, Imie, Nazwisko FROM pracownicy";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "<h2>Employees:</h2>";
                    echo "<table>";
                    echo "<tr><th>ID</th><th>Name</th><th>Last Name</th></tr>";

                    $index = 1;

                    while ($row = $result->fetch_assoc()) {
                        if ($index > 0) {
                            echo "<tr><td>" . $row["Id"] . "</td><td>" . $row["Imie"] . "</td><td>" . $row["Nazwisko"] . "</td></tr>";
                        }
                        $index++;
                    }
                    echo "</table>";
                } else {
                
                    echo "null";
                }

                $conn->close();
            ?>
        </div>
    </section>

    <footer>
            <div class="FooterOne">
                <p>HelpTech IT - company <br> 1300 Meylert Ave,Scranton <br> PA 18509, Stany Zjednoczone</p>
            </div>
            <div class="FooterTwo">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d24432.995077209922!2d-75.6463197470271!3d41.42196168957681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1spl!2spl!4v1718091370859!5m2!1spl!2spl" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="FooterThree">
                <div class="FooterThree-top">
                <a href="https://www.youtube.com/watch?v=xm3YgoEiEDc" target="_blanck">  <img src="img/icons/blip.png" alt="blip"></a>
                <a href="https://www.youtube.com/watch?v=xm3YgoEiEDc" target="_blanck"> <img src="img/icons/fb.png" alt="fb"></a>
                <a href="https://www.youtube.com/watch?v=xm3YgoEiEDc" target="_blanck"> <img src="img/icons/link.png" alt="link"></a>
                <a href="https://www.youtube.com/watch?v=xm3YgoEiEDc" target="_blanck"> <img src="img/icons/pint.png" alt="pint"></a>
                </div>
                <div class="FooterThree-bottom">
                <a href="https://www.youtube.com/watch?v=xm3YgoEiEDc" target="_blanck"> <img src="img/icons/skype.png" alt="skype"></a>
                   <a href="https://www.youtube.com/watch?v=xm3YgoEiEDc" target="_blanck">  <img src="img/icons/twit.png" alt="twit"></a>
                   <a href="https://www.youtube.com/watch?v=xm3YgoEiEDc" target="_blanck">  <img src="img/icons/what.png" alt="what"></a>
                   <a href="https://www.youtube.com/watch?v=xm3YgoEiEDc" target="_blanck"> <img src="img/icons/yt.png" alt="yt"></a>
                </div>
            </div>
        </footer>
</body>
</html>
<script>
    function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}


function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft = "0";
}

</script>
