<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>🤡 Muzyka</title>
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
            <h2>Muzyka</h2>
            
            <p>Dodawanie muzyki</p>
            <form action="add_music.php" method="post">
                <select id="kategoria" name="kategoria">
                <?php
                    $db = new SQLite3('baza.db');
                    $query = 'SELECT DISTINCT kategoria FROM muzyka';
                    $result = $db -> query($query);
                    while($r = $result -> fetchArray())
                    {
                        echo '<option value="'.$r['kategoria'].'">'.$r['kategoria'].'</option>';
                    }
                    $db -> close();
                ?>
                </select><br><br>
                Nazwa: <br>
                <input type="text" name="name" id="name"><br><br>
                Link do youtube.com: <br>
                <input type="text" name="link" id="link"><br><br>
                <input type="submit" value="Dodaj">
            </form><br>

            <form action="music_display.php" method="post">
                <select id="music" name="music">
            <?php
                 $db = new SQLite3('baza.db');
                 $query = 'SELECT DISTINCT kategoria FROM muzyka';
                 $result = $db -> query($query);
                 while($r = $result -> fetchArray())
                 {
                     echo '<option value="'.$r['kategoria'].'">'.$r['kategoria'].'</option>';
                 }
                 $db -> close();
            ?>
                </select>
                <input type="submit" value="Pokaż">
            </form><br>
            <?php
                if(@$_SESSION['zalogowany'])
                {
                    echo 'Dodaj komentarz: <br>';
                    echo '<form action="komentarz_muzyka.php" method="post">';
                    echo '<select id="musicc" name="musicc">';
                    
                    $db = new SQLite3('baza.db');
                    $query = 'select nazwa from muzyka';
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
                <th>Link</th>
                <th>Imię</th>
                <th>Nazwisko</th>
                <th>Komentarz</th>
            </tr>
            <?php
                if(isset($_SESSION['wynik']))
                {
                    $sql = "SELECT muzyka.nazwa, muzyka.link_yt, uzytkownicy.imie, uzytkownicy.nazwisko, muzyka_komentarze.komentarz FROM muzyka, uzytkownicy, muzyka_komentarze WHERE muzyka_komentarze.id_uzytkownika = uzytkownicy.id AND muzyka_komentarze.id_muzyka = muzyka.id AND muzyka.kategoria = '$_SESSION[wynik]' ORDER BY muzyka.nazwa;";
                    $db = new SQLite3('baza.db');
                    $result = $db -> query($sql);
                    while($r = $result -> fetchArray())
                    {
                        echo '<tr><td>'.$r['nazwa'].'</td><td><a style="color: blue; text-decoration: underline;" href="'.$r['link_yt'].'" target="_blank">LINK</a></td><td>'.$r['imie'].'</td><td>'.$r['nazwisko'].'</td><td>'.$r['komentarz'].'</td></tr>';
                    }
                    $db -> close();
                    echo $_SESSION['wynik'];
                }
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