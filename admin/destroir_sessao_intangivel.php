<?php
	session_start();
	unset($_SESSION['ultimo_id']);
	unset($_SESSION['notasadicionais']);
	unset($_SESSION['designacao']);
	unset($_SESSION['tipo_aquisicao']);
	unset($_SESSION['entidade_fornecedora']);	
	unset($_SESSION['control_aba']);
	header("Location: index.php?link=12");
?>
