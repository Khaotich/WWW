<?php

    session_start();
    
    if(!empty($_POST['comment']))
    {
        unset($_SESSION['kom']);

        $db = new SQLite3('baza.db');
        $sql_id_muzyka = 'select id from muzyka where nazwa ="'.$_POST['musicc'].'";';
        $result = $db -> query($sql_id_muzyka);
        $rows = $result -> fetchArray();
        $id_muzyka = $rows['id'];
        
        $sql_insert = 'INSERT INTO muzyka_komentarze (id_muzyka, id_uzytkownika, komentarz) VALUES ('.$id_muzyka.','.$_SESSION['id'].',"'.$_POST['comment'].'");';
        $db -> query($sql_insert);

        $db -> close();
        $_SESSION['kom'] = '<span style="color: green;">Komentarz został dodany!</span>';
        header('Location: muzyka.php');
    }
    else
    {
        $_SESSION['kom'] = '<span style="color: red;">Uzupełni treść komentarza!</span>';
        header('Location: muzyka.php');
    }

?>