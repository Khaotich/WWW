<?php
include "0begin.php";
?>
<h1>Filmy</h1>

<ul>
<?php

  $obrazki=scandir('video');


  foreach($obrazki as $plik)

  {if($plik[0]!='.')
     echo "<video width='420'><source src='video/$plik'></video>";
  }
?>
</ul>
<?php
include "0end.php";