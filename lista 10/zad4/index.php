<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Widok Wydarzeń</title>
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
            
            <h1>Przyszłe Wydarzenia</h1>

            <table>
                <tr>
                    <th>Nazwa Wydarzenia</th>
                    <th>Rodzaj Wydzarzenia</th>
                    <th>Dzień</th>
                    <th>Miesiąc</th>
                    <th>Rok</th>
                    <th>Godzina</th>
                    <th>Minuta</th>
                    <th>Czas Trwania</th>
                    <th>Działania</th>
                </tr>
            
            <?php

                session_start();

                function add_zero($x)
                {
                    if(strlen($x)==1) return '0'.$x;
                    else return $x;
                }

                $sql = "SELECT * FROM event;";
                $date_id = [];

                $db = new SQLite3('src/database.db'); 
                $result = $db -> query($sql);
                
                $time_now = microtime(true);
                
                while($r = $result -> fetchArray())
                {
                    $time = strtotime($r['year'].'-'.$r['month'].'-'.$r['day'].' '.$r['hour'].':'.$r['minutes']);
                    if($time > $time_now) array_push($date_id, $r['id']);
                }
                
                for($i = 0; $i < count($date_id); $i++)
                {
                    $sql = "SELECT * FROM event WHERE id='$date_id[$i]'";
                    $result = $db -> query($sql);

                    while($r = $result -> fetchArray())
                    {
                        $id = $r['id'];
                        $name = add_zero($r['name']);
                        $type = add_zero($r['type']);
                        $time =  add_zero($r['time']);        
                        $day = add_zero($r['day']);
                        $month = add_zero($r['month']);
                        $year = add_zero($r['year']);
                        $hour = add_zero($r['hour']);
                        $minutes = add_zero($r['minutes']);
                        
                        echo "<tr><td>$name</td><td>$type</td><td>$day</td><td>$month</td><td>$year</td><td>$hour</td><td>$minutes</td><td>$time</td><td><a class='button' href='#' onclick='edit($id)';>Edytuj</a>  <a class='button' href='#' onclick='remove($id)'>Usuń</a></td></tr>";
                    }
                }

                $db -> close();

            ?>

            </table>

            <?php
                if(isset($_SESSION['error'])) echo $_SESSION['error'];
                unset($_SESSION['error']);
            ?>

            <script>
            
                function edit(id) 
                {
                    answer = confirm("Jesteś pewien edycji wydarzenia?")

                    if (answer != 0) window.location.replace('php/edit_event.php?id=' + id);
                }

                function remove(id) 
                { 
                    answer = confirm("Jesteś pewien usunięcia wydarzenia?")

                    if (answer != 0) window.location.replace('php/remove_event.php?id=' + id);
                }

            </script>

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