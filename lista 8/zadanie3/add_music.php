<?php

    session_start();
    
    if(!empty($_POST['name']))
    {
        unset($_SESSION['kom']);

        $name = $_POST['name'];
        $link = $_POST['link'];
        $category = $_POST['kategoria'];

        $db = new SQLite3('baza.db');
        $sql_insert = "INSERT INTO muzyka (nazwa, kategoria, link_yt) VALUES ('$name', '$category', '$link');";
        $db -> query($sql_insert);
        $db -> close();

        $_SESSION['kom'] = '<span style="color: green;">Muzyka została dodana!</span><br>';
        header('Location: muzyka.php');
    }
    else
    {
        $_SESSION['kom'] = '<span style="color: red;">Uzupełni treść!</span><br>';
        header('Location: muzyka.php');
    }

?>