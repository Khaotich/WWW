<!-- zadanie 6 -->

<?php
include "0begin.php";
?>

<h1>Nowa Wiadomość</h1>

<form method="POST">
    <label for="title">Tytuł: </label><br>
    <input type="text" name="title" id="title"><br><br>
    <label for="content">Treść wiadomości: </label><br>
    <textarea id="content" name="content" rows="4" cols="50"></textarea><br>
    Login: <br>
    <input type="text" name="login" id="login"><br>
    Hasło: <br>
    <input type="password" id='pass' name='pass'><br><br>
    <input type="submit" value="Dodaj">
</form>

<?php

    @$title = $_POST['title'];
    @$content = $_POST['content'];
    if(isset($title) && isset($content) && !empty($title) && !empty($content) && @$_POST['pass'] == 'klucze123' && !empty($_POST['pass']) && @$_POST['login'] == 'admin' && !empty($_POST['login']))
    {
        $ile = count(scandir('news'))-1;
        $news = fopen('news/news'.strval($ile).'.html','w');
        fwrite($news, '<h2>'.$title.'</h2>'.$content);
        fclose($news);
    }
    else
    {
        if(!empty($_POST['pass'])) echo '<br>Niepoprawne hasło!';
    }
    
?>

<?php
include "0end.php";
?>