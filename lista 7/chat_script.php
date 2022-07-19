<!-- Zadanie 9 -->
<?php
$czat=file_get_contents('wpisy.html');

if($_POST && $_POST['imie'] && $_POST['wpis'] && $_POST['haslo'] =='klucze123' && $_POST['login'] =='admin')
{
 $czat .= "<li><b>$_POST[imie]</b>: $_POST[wpis]</li>\n";
 file_put_contents('wpisy.html',$czat); 
}

echo $czat;
?>