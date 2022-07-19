<!-- zadanie 3 -->

<?php
include "0begin.php";
?>
<h1>Liczby pierwsze do 10000</h1>

<?php

    function pierwsza($x)
    {
        $i = 0;
        for($n=1; $n <= $x; $n++)
        {
            if($x % $n == 0) $i++;
        }
        if($i == 2) return TRUE;
        else return FALSE;
    }

    for($i = 1; $i<=10000; $i++)
    {
        if(pierwsza($i)) echo $i . ", ";
    }

?>

<?php
include "0end.php";
?>