<?php

    session_start();
    
    if(!empty($_POST['comment']))
    {
        unset($_SESSION['kom']);

        $db = new SQLite3('baza.db');
        $sql_id_ksiazki = 'select id from ksiazki where nazwa ="'.$_POST['book'].'";';
        $result = $db -> query($sql_id_ksiazki);
        $rows = $result -> fetchArray();
        $id_ksiazki = $rows['id'];
        
        $sql_insert = 'INSERT INTO ksiazki_komentarze (id_ksiazki, id_uzytkownika, komentarz) VALUES ('.$id_ksiazki.','.$_SESSION['id'].',"'.$_POST['comment'].'");';
        $db -> query($sql_insert);

        $db -> close();
        $_SESSION['kom'] = '<span style="color: green;">Komentarz został dodany!</span>';
        header('Location: ksiazki.php');
    }
    else
    {
        $_SESSION['kom'] = '<span style="color: red;">Uzupełni treść komentarza!</span>';
        header('Location: ksiazki.php');
    }

?>