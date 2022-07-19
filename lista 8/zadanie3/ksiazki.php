<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>🤡 Książki</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div id="container">
        <div id="topbar">
                    <div>
                        <div id="status">
                            <?php
                                session_start();
                                if(isset($_SESSION['zalogowany']))
                                {
                                    echo '<span style="color: green;">Status sesji: zalogowano jako '.$_SESSION['imie'].' '.$_SESSION['nazwisko'].'</span>';
                                }
                                else
                                {
                                    echo '<span style="color: red;">Status sesji: niezalogowano</span>'; 
                                }
                            ?>
                        </div>
                        <div id='logout'>
                            <?php
                                if(isset($_SESSION['zalogowany'])) echo '<a href="logout.php">[Wyloguj się 🔓]</a>';
                            ?>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div id="menu">
                        <ul>
                            <a href="index.php"><li>Strona Główna 📃</li></a>
                            <a href="logowanie.php"><li>Logowanie 🔒</li></a>
                            <a href="muzyka.php"><li>Muzyka 🎵</li></a>
                            <a href="filmy.php"><li>Filmy i Seriale 🎬</li></a>
                            <a href="ksiazki.php"><li>Książki 📚</li></a>
                            <a href="skoczki.php"><li>Ranking Skoczków ⛷️</li></a>
                        </ul>
                </div>
                <div class="clear"></div>
            </div>
        <div id="content">
            <h2>Książki</h2>
            <?php
                if(@$_SESSION['zalogowany'])
                {
                    echo 'Dodaj komentarz: <br>';
                    echo '<form action="komentarz_ksiazka.php" method="post">';
                    echo '<select id="book" name="book" style="margin-bottom: 10px;">';
                    
                    $db = new SQLite3('baza.db');
                    $query = 'select * from ksiazki';
                    $result = $db -> query($query);
                    while($r = $result -> fetchArray())
                    {
                        echo '<option value="'.$r['nazwa'].'".>'.$r['nazwa'].'</option>';
                    }
                    $db -> close();

                    echo '</select>';
                    echo '<input type="text" name="comment" id="comment" style="width: 500px; margin-left: 10px;">';
                    echo '<input type="submit" value="Dodaj" style="margin-left: 10px;">';
                    echo '</form>';
                    echo '<br>';

                    if(isset($_SESSION['kom'])) echo $_SESSION['kom'];
                    unset($_SESSION['kom']);
                }
            ?>
            <table>
            <tr>
                <th>Nazwa</th>
                <th>Imię</th>
                <th>Nazwisko</th>
                <th>Komentarz</th>
            </tr>
            <?php
                $sql = 'SELECT ksiazki.nazwa, uzytkownicy.imie, uzytkownicy.nazwisko, ksiazki_komentarze.komentarz 
                        FROM uzytkownicy, ksiazki, ksiazki_komentarze 
                        WHERE uzytkownicy.id=ksiazki_komentarze.id_uzytkownika AND ksiazki.id=ksiazki_komentarze.id_ksiazki
                        ORDER BY ksiazki.nazwa DESC;';

                $db = new SQLite3('baza.db');
                $result = $db -> query($sql);
                while($r = $result -> fetchArray())
                {
                    echo '<tr><td>'.$r['nazwa'].'</td><td>'.$r['imie'].'</td><td>'.$r['nazwisko'].'</td><td>'.$r['komentarz'].'</td></tr>';
                }
                $db -> close();   
            ?>
            </table>
        </div>
        <hr>
        <div id="footer">
            <div id="description">
                Serwis Lista 8
            </div>
            <div id="author">
                Karol Pichurski
            </div>
            <div id="copyright">
                ©️ Copyright 2020
            </div>
            <div class="clear"></div>
        </div>
    </div>

</body>
</html>