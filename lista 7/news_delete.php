<!-- zadanie 7 -->

<?php
include "0begin.php";
?>

<h1>Usuń Wiadomość</h1>

<form method="POST" onsubmit="confirm('Czy na pewno?')">
    <select name="news" id="news">
<?php
    $posts = scandir('news');
    foreach($posts as $post)
        if($post[0]!='.')
            echo '<option value="'.$post.'">'.$post.'</option>';
?>
    </select><br><br>
    Login:
    <input type="text" id='login' name='login'>
    <br><br>
    Hasło:
    <input type="password" id='pass' name='pass'>
    <br><br>
    <input type="submit" name="supp" id="supp" value="Usuń">
    <input type="reset" value="Anuluj">
</form>

<?php

    if(@$_POST['pass'] == 'klucze123' && !empty($_POST['pass']) && @$_POST['login'] == 'admin' && !empty($_POST['login']))
    {
        @$del = $_POST['news'];
        @rename('news/'.$del,'news/'.'.'.$del);
        if(@$_POST['supp'])header("Refresh:0");
    }
    else
    {
        if(!empty($_POST['pass'])) echo '<br>Niepoprawne hasło lub hasło!';
    }
    
?>

<?php
include "0end.php";
?>