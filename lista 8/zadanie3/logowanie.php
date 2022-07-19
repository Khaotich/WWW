<?php 
    session_start(); 
    if(isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'])
    {
        header('Location: index.php');
        exit();
    }    
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>🤡 Strona Logowania</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div id="container">
        <div id="topbar">
                <div>
                    <div id="status">
                        <?php
                            if(isset($_SESSION['zalogowany']))
                            {
                                echo '<span style="color: #7FFF00;">Status sesji: zalogowano jako '.$_SESSION['imie'].' '.$_SESSION['nazwisko'].'</span>';
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
            <div id="login_">
                <h2>Logowanie</h2>
                <form action="login.php" method="post">
                    <input type="text" name="login" id="login" placeholder="Login"><br>
                    <input type="password" name="haslo" id="haslo" placeholder="Hasło"><br>
                    <input type="submit" value="Zaloguj">
                </form><br>
                <?php 
                    if(isset($_SESSION['blad'])) echo $_SESSION['blad'];
                    unset($_SESSION['blad']);
                ?>
            </div>
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