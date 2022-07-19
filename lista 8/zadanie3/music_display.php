<?php
    session_start();
    $_SESSION['wynik'] = $_POST['music'];
    header('Location: muzyka.php');
?>