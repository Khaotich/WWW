<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Dodawanie Wydarzenia</title>
  <link rel="stylesheet" href="src/style.css">
</head>
<body>
    
    <div id="container">
        <div id="topbar">
            <div id="menu">
                <ul>
                    <a href="index.php"><li>Widok Terminy 📃</li></a>
                    <a href="view_week.php"><li>Widok Tydzień 📆</li></a>
                    <a href="view_month.php"><li>Widok Miesiąc 📅</li></a>
                    <a href="event_add.php"><li>Dodaj Termin ➕</li></a>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
        <div id="content">
            
            <h1>Dodaj Wydarzenie</h1>

            <form action="php/add_event.php" method="post">
                Nazwa: <br>
                <input type="text" name="name" id="name"><br><br>
                Rodzaj: <br>
                <input type="text" name="type" id="type"><br><br>
                Data: <br>
                <input type="datetime-local" name="date" id="date"><br><br>
                Czas (minuty): <br>
                <input type="number" name="time" id="time"><br><br>
                <input type="submit" value="Dodaj">
            </form>
            <br><br>

            <?php
                session_start();
                
                if(isset($_SESSION['error'])) echo $_SESSION['error'];
                unset($_SESSION['error']);
            ?>

        </div>
        <div id="footer">
            <hr>
            <div id="description">
                Terminarz Lista 10
            </div>
            <div id="author">
                Karol Pichurski
            </div>
            <div id="copyright">
                ©️ Copyright 2021
            </div>
            <div class="clear"></div>
        </div>
    </div>

</body>
</html>