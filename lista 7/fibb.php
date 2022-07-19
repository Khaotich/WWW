<!-- zadanie 2 -->

<?php
include "0begin.php";
?>
<h1>Ciąg Fibonacciego do 10000</h1>

<?php

  $tablica = array(1,1);
  $cos = 0;
  $i = 0;
  while(TRUE)
  {
    $cos = $tablica[$i] + $tablica[$i+1];
    if($cos > 10000) break;
    array_push($tablica,($tablica[$i] + $tablica[$i+1]));
    $i++;
  }
  
  foreach($tablica as $x) echo strval($x) . ", ";
 
?>

<?php
include "0end.php";
?>