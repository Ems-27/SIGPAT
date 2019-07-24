<?php
	session_start();
	unset($_SESSION['ultimo_id']);
	unset($_SESSION['funcionario']);
	unset($_SESSION['departamento']);
	unset($_SESSION['control_aba']);
	header("Location: cadastrar-afectacao.php");
?>