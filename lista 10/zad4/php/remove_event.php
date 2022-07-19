<?php
    
        $id = $_GET['id'];
        $db = new SQLite3('../src/database.db');
        $sql = "DELETE FROM event WHERE id=$id;";
        $result = $db -> query($sql);
        $db -> close();
        header('Location: ../index.php');

?>