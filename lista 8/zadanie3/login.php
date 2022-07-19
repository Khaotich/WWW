<?php
    
    session_start();

    if(isset($_SESSION['zalogowany']))
    {
        header('Location: index.php');
        exit();
    }

    $db = new SQLite3('baza.db');
    $login = $_POST['login'];
    $pass = $_POST['haslo'];
    
    $query = 'select * from uzytkownicy';
    $result = $db -> query($query);
    $rows = $result->fetchArray();
    $status = false;
    
    while($r= $result->fetchArray())
    {
        if($r['login'] == $login && $r['haslo'] == $pass) 
        {
            $status = true;
            $_SESSION['imie'] = $r['imie'];
            $_SESSION['nazwisko'] = $r['nazwisko'];
            $_SESSION['id'] = $r['id'];
        }
    }

    if($status)
    {
        $_SESSION['zalogowany'] = true; 
        unset($_SESSION['blad']);
        header('Location: index.php');
    }
    else
    {
        $_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
        header('Location: logowanie.php');
    }

    $db -> close();
?>