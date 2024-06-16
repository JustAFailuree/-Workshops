<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.1.4/index.global.min.css' rel='stylesheet' />
    <link href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/css/bootstrap.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="Grafika.css">
</head>
<body>
<div id="container">
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
                    <a href="Grafik.php">Schedule</a>
                    <a href="AddOrder.php">Add new order</a>
                    <a href="Index.php">Add new employee</a>
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
            <div class="banner">
                <h2>Calendar with Orders</h2>
            </div>
 
                    <div id='calendar'></div>
                    <div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalBody"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
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
</div>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.14/index.global.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: 'events.php', 
                eventClick: function(info) {
                    info.jsEvent.preventDefault(); 
                    if (info.event.extendedProps.description) {
                        document.getElementById('modalTitle').innerText = info.event.title;
                        document.getElementById('modalBody').innerHTML = info.event.extendedProps.description;
                        var myModal = new bootstrap.Modal(document.getElementById('eventModal'));
                        myModal.show();
                    }
                }
            });
            calendar.render();
        });
    </script>
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
