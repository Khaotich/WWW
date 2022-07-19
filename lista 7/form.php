<!-- zadanie 5 -->

<?php
include "0begin.php";
?>

    <h1>Kilka Słów o Sobie</h1>

    <form>
        <label for="imie">Imię: </label><br>
        <input type="text" name="imie" id="imie"><br><br>
        <label for="nazwisko">Nazwisko: </label><br>
        <input type="text" name="nazwisko" id="nazwisko"><br><br>
        <label for="wiek">Wiek: </label><br>
        <input type="number" name="wiek" id="wiek"><br><br>
        <label for="cars">Płeć:</label>
        <select name="plec" id="plec">
            <option value="mężczyzna">mężczyzna</option>
            <option value="kobieta">kobieta</option>
        </select><br><br>
        <label>Czym się poruszasz: </label><br>
        <input type="checkbox" id="pojazd1" name="pojazd1" value="rower">
        <label for="pojazd1">rower</label><br>
        <input type="checkbox" id="pojazd2" name="pojazd2" value="samochód">
        <label for="pojazd2">samochód</label><br>
        <input type="checkbox" id="pojazd3" name="pojazd3" value="motor">
        <label for="pojazd3">motor</label><br><br>
        <label for="cos">Napisz swoje zainsteresowanie: </label><br>
        <textarea id="cos" name="cos" rows="4" cols="50"></textarea><br>
        <input type="submit" value="Pokaż">
    </form>
    <br><br>

<?php

    echo 'Imię: '.@$_GET['imie'].'<br>';
    echo 'Nazwisko: '.@$_GET['nazwisko'].'<br>';
    echo 'Wiek: '.@$_GET['wiek'].'<br>';
    echo 'Płeć: '.@$_GET['plec'].'<br>';
    echo 'Pojazd: '.@$_GET['pojazd2'].'<br>';
    echo 'Pojazd: '.@$_GET['pojazd3'].'<br>';
    echo 'Pojazd: '.@$_GET['pojazd1'].'<br>';
    echo 'Zainteresowanie: '.@$_GET['cos'].'<br>';

?>

<?php
include "0end.php";
?>