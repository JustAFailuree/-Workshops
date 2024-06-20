<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new employee</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="Index.css">
</head>
<body>
<nav>
            <div class="NavLeft">
                <a href="Grafik.php">Schedule</a>
                <?php
                if ($_SESSION["role"] === "A") { ?>
                <a href="AddOrder.php">Orders</a>
                <a href="Index.php">Employees</a>
                <?php } ?>
            </div>
            <div class="NavRight">
                <a href="logout.php">Logout</a>
            </div>

            <div id="mySidebar" class="sidebar">
                <a href="#" class="closebtn" onclick="closeNav()">&times;</a>
                <?php
                    if ($_SESSION["role"] === "A") { ?>
                    <a href="Grafik.php">Schedule</a>
                    <a href="AddOrder.php">Orders</a>
                    <a href="Index.php">Employees</a>
                    <a href="logout.php">Logout</a>
                    <?php } ?>
                    <?php
                    if ($_SESSION["role"] === "P") { ?>
                    <a href="Grafik.php">Schedule</a>
                    <a href="logout.php">Logout</a>
                    <?php } ?>
            </div>
          <div id="main">
            <button class="openbtn" onclick="openNav()">&#9776; Open MENU</button>
          </div>

        </nav>

    <section>
        <div class="SectionForm">
            <h2>Add employee:</h2>
            <form action="addEmployee.php" name="name" id="formularz" method="post">
                <div class="top">
                <div class="inside">
                    <label>ID:</label> 
                    <input type="number"  id="id" name="ID" placeholder="Enter your ID"><br>
                </div>
                <div class="inside">
                    <label>Name:</label>
                    <input type="text" name="Imie" id="imie" placeholder="Enter your Name">
                </div>
                <div class="inside">
                    <label>Last Name:</label>
                    <input type="text" name="Nazwisko"  id="nazwisko" placeholder="Enter your Last Name">
                </div>
                <div class="inside">
                    <label>Age:</label>
                    <input type="number" name="Wiek"  id="wiek" placeholder="Enter your Age">
                </div>
                <div class="inside">
                    <label>Phone Number:</label>
                    <input type="number" name="Telefon"  id="telefon" placeholder="Enter your Phone Number">
                </div>
                <div class="inside">
                    <label>E-mail:</label> 
                    <input type="text" name="Mail"  id="mail" placeholder="Enter your E-mail"><br>
                </div>
                <div class="inside">
                    <label>Nick:</label> 
                    <input type="text" name="Nick"  id="nick" placeholder="Enter your Nick"><br>
                </div>
                <div class="inside">
                    <label>Password:</label> 
                    <input type="password" name="Pass"  id="haslo" placeholder="Enter your Password">
                </div>
            </div>
            
            <div class="mid">
                <label>Choose a role:</label>
                <select name="Role" id="">
                    <option value="P">Employee</option>
                    <option value="A">Admin</option>
                    </select>
            </div>
            <div class="bottom">
                <input type="submit" value="Submit" name="submit" id="submit">
                <input type="reset" value="Reset" id="resetbutton" onclick="alert('Your data was cleaned')">
            </div>
            </form>
            <script>
                document.getElementById('formularz').addEventListener('submit',function(event)
                {
                    var id = document.getElementById('id').value;
                    var imie = document.getElementById('imie').value;
                    var nazwisko = document.getElementById('nazwisko').value;
                    var wiek = document.getElementById('wiek').value;
                    var telefon = document.getElementById('telefon').value.length;
                    var mail = document.getElementById('mail').value;
                    var nick = document.getElementById('nick').value;
                    var haslo = document.getElementById('haslo').value.length;
                   

                    if(id == '' || imie == '' || nazwisko == '' || wiek == '' || telefon == '' || mail == '' || nick == '' || haslo == '')
                    {
                        event.preventDefault();
                        alert('Fill in all fields');
                    }
                    else
                    {
                        if(id < 1)
                        {
                            event.preventDefault();
                            alert('Id cannot be less than 1');
                        }
                        
                        if(wiek < 1)
                        {
                            event.preventDefault();
                            alert('Age cannot be less than 1');
                        }
                        
                        if(haslo < 6)
                        {
                            event.preventDefault();
                            alert('Password must be longer than 6 characters');
                        }
                                
                        if(telefon != 9){
                            event.preventDefault();
                            alert('Phone number must have 9 characters')
                        }
                                
                        
                    }
                    


                });

                function tylkoLitery(event) 
                {
                    const inputElement = event.target;
                    const inputValue = inputElement.value;

                    const newValue = inputValue.replace(/[^a-zA-ZąćęłńóśźżĄĆĘŁŃÓŚŹŻ]/g, ''); 
                    inputElement.value = newValue;
                }

                window.onload = function() 
                {
                    const imieInput = document.querySelector('input[name="Imie"]');
                    const nazwiskoInput = document.querySelector('input[name="Nazwisko"]');
                    
                    imieInput.addEventListener('input', tylkoLitery);
                    nazwiskoInput.addEventListener('input', tylkoLitery);
                }

            </script>
        </div>
        
        <div class="right">
                <?php
                    include 'pma.php';
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    $sql = "SELECT Id, Imie, Nazwisko FROM pracownicy";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        echo "<h2>Employess:</h2>";
                        echo "<table>";
                        echo "<tr><th>ID</th><th>Name</th><th>Last Name</th>";
        
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . $row["Id"] . "</td>
                                    <td>" . $row["Imie"] . "</td>
                                    <td>" . $row["Nazwisko"] . "</td>
                                </tr>";
                        }
                        echo "</table>";
                    } else {
                    
                        echo "null";
                    }

                    $conn->close();
                ?>
            </div>
        </div>
        

        <div class="formUsuwanie">
        <h2>Delete employee:</h2>
            <form action="deleteEmployee.php" name="name"  id="formularz2" method="post">
            <div class="top">
                <div class="inside">
                    <label>ID:</label> 
                    <input type="number"  id="id2" name="ID2" placeholder="Enter your ID"><br>
                </div>
            </div>
            <div class="bottom">
                <input type="submit" value="Submit" name="submitUsun" id="submitUsun">
                <input type="reset" value="Reset" id="resetbuttonUsun" onclick="alert('Your data was cleaned')">
            </div>
            </form>
        </div>
        <script>
            document.getElementById('formularz2').addEventListener('submit',function(event2)
                {
                    var id = document.getElementById('id2').value;

                    if(id == '')
                    {
                        event2.preventDefault();
                        alert('Fill in all fields');
                    }
                    else
                    {
                        if(id < 1)
                        {
                            event2.preventDefault();
                            alert('Id cannot be less than 1');
                        }      
                        
                    }
                });
        </script>
        
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
                <a href="https://www.youtube.com/watch?v=xm3YgoEiEDc">  <img src="img/icons/blip.png" alt="blip"></a>
                <a href="https://www.youtube.com/watch?v=xm3YgoEiEDc"> <img src="img/icons/fb.png" alt="fb"></a>
                <a href="https://www.youtube.com/watch?v=xm3YgoEiEDc"> <img src="img/icons/link.png" alt="link"></a>
                <a href="https://www.youtube.com/watch?v=xm3YgoEiEDc"> <img src="img/icons/pint.png" alt="pint"></a>
                </div>
                <div class="FooterThree-bottom">
                <a href="https://www.youtube.com/watch?v=xm3YgoEiEDc"> <img src="img/icons/skype.png" alt="skype"></a>
                   <a href="https://www.youtube.com/watch?v=xm3YgoEiEDc">  <img src="img/icons/twit.png" alt="twit"></a>
                   <a href="https://www.youtube.com/watch?v=xm3YgoEiEDc">  <img src="img/icons/what.png" alt="what"></a>
                   <a href="https://www.youtube.com/watch?v=xm3YgoEiEDc"> <img src="img/icons/yt.png" alt="yt"></a>
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
