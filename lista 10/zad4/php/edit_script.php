<?php

    session_start();
    
    if(!empty($_POST['name']) && !empty($_POST['type']) && !empty($_POST['date']) && !empty($_POST['time']))
    {
        unset($_SESSION['error']);

        $id = $_SESSION['id'];
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
        $sql = "UPDATE event SET name = '$name', type = '$type', day = '$day', month = '$month', year = '$year', hour = '$hour', minutes = '$minutes', time = '$time' WHERE id='$id';";
        $db -> query($sql);
        $db -> close();

        $_SESSION['error'] = '<br><span style="color: green;">Wydarzenie zostało zaktualiozowane!</span>';
        header('Location: ../index.php');
    }
    else
    {
        $_SESSION['error'] = '<br><span style="color: red;">Uzupełni treść wydarzenia!</span>';
        header('Location: edit_event.php?id='.$_SESSION['id']);
    }

?>