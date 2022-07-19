<?php

$room=intval($_POST['room']);       // numer planszy
$restart=intval($_POST['restart']); // czy now gra ?
$id=intval($_POST['id']);           // id klikniętego pola (1..100)
$znak=$_POST['znak'][0]; // rodzaj pionka ('o' lub 'x')

$znaki=file_get_contents("gra/$room");
if($znaki=='')                   // jeżeli plik pusty lub go nie ma
    $znaki=str_repeat(' ',401);  // tworzymy pustą planszę 20x20 i jedno pole określające kto wygrał

// liczymy czyj ruch


$kolej= $znak;

if($znak==$kolej && $znaki[$id]==' ' && $znaki[400]==' ')
{
    $znaki[$id]=$znak;
    $znaki[400]=winner($znaki); // zapomiętujemy kto wygrał, żeby nie było możliwe dalsze ruchy
    file_put_contents("gra/$room",$znaki);
}

if($restart==2)
{
    file_put_contents("gra/$room",$znaki=str_repeat(' ',401));
    $kolej='o';
}

echo json_encode(["room"=>$room,"znaki"=>$znaki,"kolej"=>$kolej]);

function winner($znaki)
{
    for($i=0;$i<20;$i++)
    for($j=0;$j<20;$j++)
    {   
        $z=$t[$i][$j]=$znaki[20*$i+$j];
        if($z=='o' || $z=='x')
        {
            for($k=1;$t[$i-$k][$j]==$z;$k++) if($k==4) return $z;
            for($k=1;$t[$i][$j-$k]==$z;$k++) if($k==4) return $z;
            for($k=1;$t[$i-$k][$j-$k]==$z;$k++) if($k==4) return $z;
            for($k=1;$t[$i-$k][$j+$k]==$z;$k++) if($k==4) return $z;
        }
    }
    return ' ';
}