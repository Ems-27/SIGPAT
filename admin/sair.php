<?php
    session_start();
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        unset($_SESSION['categoria']);
        session_destroy();
        header("location:login.php");
?>