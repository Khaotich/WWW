<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Widok Miesiąc</title>
  <link rel="stylesheet" href="src/style.css">
  <style>

    td
    {
        width: 160px;
    }

    #content
    {
        height: 800px;
    }

    #container
    {
        width: 1200px;
    }

    #topbar
    {
        margin-left: 230px;
    }

  </style>
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
            
            <h1>Widok Miesiąc</h1>    
            
            <form method="post">
                <input type="month" name="time"><br><br>
                <input type="submit" value="Pokaż">
            </form>

            <?php

                if(isset($_POST['time']) && !empty($_POST['time'])) echo "<h2>".$_POST['time']."</h2>";
                else echo "<h2>".date('Y-m')."</h2>";

            ?>

            <table id="view_month">
                <tr>
                    <th class="day">Poniedziałek</th><th class="day">Wtorek</th><th class="day">Środa</th>
                    <th class="day">Czwartek</th><th class="day">Piątek</th><th class="day">Sobota</th><th class="day">Niedziela</th>
                </tr>
                
                <?php

                    function add_zero($x)
                    {
                        if(strlen($x) == 1) return '0'.$x;
                        else return $x;
                    }
                    
                    if(isset($_POST['time']) && !empty($_POST['time']))
                    {
                        $time_ = $_POST['time'];
                        $days = date('t');
                        $year = intval($time_[0].$time_[1].$time_[2].$time_[3]);
                        $month = intval($time_[5].$time_[6]);
                        $datetime = DateTime::createFromFormat('Y-m-d', date($time_.'-01'));
                        $ff = strval($datetime -> format('D'));
                    }
                    else
                    {
                        $time_ = date('Y-m');
                        $days = date('t');
                        $year = intval($time_[0].$time_[1].$time_[2].$time_[3]);
                        $month = intval($time_[5].$time_[6]);
                        $datetime = DateTime::createFromFormat('Y-m-d', date($time_.'-01'));
                        $ff = strval($datetime -> format('D'));
                    }

                    $string = "<tr>";
                    $moves = 0;

                    if($ff == 'Tue')
                    {
                        $string = $string."<td> </td>";
                        $moves += 1;
                    }
                    
                    else if($ff == 'Wed')
                    {
                        $string = $string."<td> </td><td> </td>";
                        $moves += 2;
                    } 
                    else if($ff == 'Thu')
                    {
                        $string = $string = $string."<td> </td><td> </td><td> </td>";
                        $moves += 3;
                    } 
                    else if($ff == 'Fri')
                    {
                        $string = $string."<td> </td><td> </td><td> </td><td> </td>";
                        $moves += 4;
                    } 
                    else if($ff == 'Sat')
                    {
                        $string = $string."<td> </td><td> </td><td> </td><td> </td><td> </td>";
                        $moves += 5;
                    }
                    else if($ff == 'Sun')
                    {
                        $string = $string."<td> </td><td> </td><td> </td><td> </td><td> </td><td> </td>";
                        $moves += 6;
                    }

                    $temp = $moves;
                    $db = new SQLite3('src/database.db'); 
                    
                    for($j = 1; $j <= $days; $j++)
                    {
                        $moves++;
                        if($moves == 8 || $moves == 15 || $moves == 22) $string = $string."<tr>";

                        $day = add_zero(strval($j));
                        $sql = "SELECT * FROM event WHERE day = $j AND month = $month AND year = $year;"; 
                        $result = $db -> query($sql);

                        $string = $string."<td>".$day."<hr>";
                        while($r = $result -> fetchArray())
                        {
                            $string = $string."<p>".add_zero($r['hour']).":".add_zero($r['minutes'])." ".add_zero($r['name'])."</p>";
                        }
                        $string = $string."</td>";

                        if($moves % 7 == 0 || $moves == $days + $temp) $string = $string."</tr>";
                    }

                    $db -> close();
                    echo $string;

                ?>

            </table>

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