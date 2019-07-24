<?php
	session_start();
	unset($_SESSION['ultimo_id']);
	unset($_SESSION['apolice_num']);
	unset($_SESSION['data']);
	unset($_SESSION['riscos_cobertos']);
	unset($_SESSION['valor']);
	unset($_SESSION['seguradora']);
	header("Location: cadastrar-seguro-imovel.php");
?>