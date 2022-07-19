<!-- zadanie 5 -->

<?php
include "0begin.php";
?>
<h1>Tabliczka Mnożenia</h1>
<a href="?n=10"> do 10 </a>
<a href="?n=20"> do 20 </a>
<a href="?n=30"> do 30 </a>

<table>
<?php

    @$n = $_GET['n'];
    if(!isset($n)) $n = 20;

    echo '<tr><th></th>';
    for($j = 1; $j <= $n; $j++) echo '<th>'.$j.'</th>';
    echo '</tr>';

    for($i = 1; $i <= $n; $i++)
    {
        echo'<tr><th>'.$i.'</th>';
        for($j = 1; $j <= $n; $j++)
        {
            echo '<td>'.($i*$j).'</td>';
        }
        echo '</tr>';
    }
 
?>
</table>
<?php
include "0end.php";