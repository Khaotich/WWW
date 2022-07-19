<?php

    session_start();
    
    if(!empty($_POST['name']) && !empty($_POST['type']) && !empty($_POST['date']) && !empty($_POST['time']))
    {
        unset($_SESSION['error']);

        $name = $_POST['name'];
        $type = $_POST['type'];
        $date = $_POST['date'];
        $time = $_POST['time'];

        $day = $date[8].$date[9];
        $month = $date[5].$date[6];
        $year = $date[0].$date[1].$date[2].$date[3];
        $hour = $date[11].$date[12];
        $minutes = $date[14].$date[15];
        
        $db = new SQLite3('../src/database.db'); 
        $sql = "INSERT INTO event (name, type, day, month, year, hour, minutes, time) VALUES ('$name','$type','$day','$month','$year','$hour','$minutes','$time');";
        $db -> query($sql);
        $db -> close();

        $_SESSION['error'] = '<span style="color: green;">Wydarzenie zostało dodane!</span>';
        header('Location: ../event_add.php');
    }
    else
    {
        $_SESSION['error'] = '<span style="color: red;">Uzupełni treść wydarzenia!</span>';
        header('Location: ../event_add.php');
    }

?>