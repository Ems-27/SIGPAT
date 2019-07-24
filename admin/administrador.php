<?php 

session_start();

if(!isset($_SESSION['aberto_admin']) or $_SESSION['categoria'] != 'admin'):
    header("Location:login.php");
endif; 
echo "Bem vindo Administrador: ".$_SESSION['prinome']." ".$_SESSION['ultnome'];

?>