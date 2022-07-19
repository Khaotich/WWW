<?php
include "0begin.php";
?>
<h1>Polecane Seriale</h1>
<?php

$a = array("Skazany na Śmierć","Breaking Bad","Wikingowie","Gra o Tron","Dom z Papieru", "The 100", "Mindhunter", "Ozark", "Mr. Robot", "Gambit Królowej", "Dark","Stranger Things");

foreach($a as $x)
    echo "<li>$x</li>";
?>
<?php
include "0end.php";