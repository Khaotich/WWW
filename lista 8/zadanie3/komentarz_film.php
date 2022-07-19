<?php

    session_start();
    
    if(!empty($_POST['comment']))
    {
        unset($_SESSION['kom']);

        $db = new SQLite3('baza.db');
        $sql_id_film = 'select id from filmy_seriale where nazwa ="'.$_POST['move'].'";';
        $result = $db -> query($sql_id_film);
        $rows = $result -> fetchArray();
        $id_film = $rows['id'];
        
        $sql_insert = 'INSERT INTO filmy_seriale_komentarze (id_filmu, id_uzytkownika, komentarz) VALUES ('.$id_film.','.$_SESSION['id'].',"'.$_POST['comment'].'");';
        $db -> query($sql_insert);

        $db -> close();
        $_SESSION['kom'] = '<span style="color: green;">Komentarz został dodany!</span>';
        header('Location: filmy.php');
    }
    else
    {
        $_SESSION['kom'] = '<span style="color: red;">Uzupełni treść komentarza!</span>';
        header('Location: filmy.php');
    }

?>