<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Edycja Wydarzenia</title>
  <link rel="stylesheet" href="../src/style.css">
</head>
<body>
    
    <div id="container">
        <div id="topbar">
            <div id="menu">
                <ul>
                    <a href="../index.php"><li>Widok Terminy 📃</li></a>
                    <a href="../view_week.php"><li>Widok Tydzień 📆</li></a>
                    <a href="../view_month.php"><li>Widok Miesiąc 📅</li></a>
                    <a href="../add_event.php"><li>Dodaj Termin ➕</li></a>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
        <div id="content">
            
            <h1>Edycja Wydzrzenia</h1>

            <form action='edit_script.php' method='post'>
            <?php
                    session_start();
                    
                    function add_zero($x)
                    {
                        if(strlen($x)==1) return '0'.$x;
                        else return $x;
                    }

                    $id = $_GET['id'];
                    $_SESSION['id'] = $id;
                    
                    $db = new SQLite3('../src/database.db');
                    $sql = "SELECT * FROM event WHERE id='$id'";
                    $result = $db -> query($sql);
                    $r = $result -> fetchArray();
                    $date = $r['year'].'-'.add_zero($r['month']).'-'.add_zero($r['day']).'T'.add_zero($r['hour']).':'.add_zero($r['minutes']);

                    echo "Nazwa: <br>";
                    echo "<input name='name' type='text' value='$r[name]'><br><br>";
                    echo "Rodzaj: <br>";
                    echo "<input name='type' type='text' value='$r[type]'><br><br>";
                    echo "Data: <br>";
                    echo "<input name='date' type='datetime-local' value='$date'><br><br>";
                    echo "Czas: (minuty)<br>";
                    echo "<input name='time' type='numer' value='$r[time]'><br><br>";        
                    
                    $db -> close();

            ?>
            
                <input type="submit" value="Potwierdź">
            </form>

            <?php
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