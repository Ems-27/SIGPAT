<?php
    session_start();
        unset($_SESSION['prinome']);
        unset($_SESSION['senha']);
        session_destroy();
        header("location:index.php");
?>