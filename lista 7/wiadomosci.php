<?php
include "0begin.php";
?>
<h1>Wiadomości</h1>
<ul>

<?php

  $obrazki=scandir('news');


  foreach($obrazki as $plik)

  {if($plik[0]!='.')
     {
       include "news/$plik";
       echo "\n\n";
     }
  }
?>

</ul>
<?php
include "0end.php";
?>