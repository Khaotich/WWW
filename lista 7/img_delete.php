<!-- zadanie 7 -->

<?php
include "0begin.php";
?>

<h1>Usuń Zdjęcie</h1>

<form method="POST" onsubmit="confirm('Czy na pewno?')">
    <select name="img" id="img">
<?php
    $posts = scandir('img');
    foreach($posts as $post)
        if($post[0]!='.')
            echo '<option value="'.$post.'">'.$post.'</option>';
?>
    </select><br><br>
    Login: 
    <input type="text" name="login" id="login">
    <br><br>
    Hasło:
    <input type="password" id='pass' name='pass'>
    <br><br>
    <input type="submit" id='subb' name='supp' value="Usuń">
    <input type="reset" value="Anuluj">
</form>

<?php

    if(@$_POST['pass'] == 'klucze123' && !empty($_POST['pass']))
    {
        @$del = $_POST['img'];
        @rename('img/'.$del,'img/'.'.'.$del);
        if(@$_POST['supp'])header("Refresh:0");
    }
    else
    {
        if(!empty($_POST['pass'])) echo '<br>Niepoprawne hasło!';
    }
    
?>

<?php
include "0end.php";
?>