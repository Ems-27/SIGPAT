<?php
	session_start();
	unset($_SESSION['ultimo_id']);
	unset($_SESSION['designacao']);
	unset($_SESSION['tipo_imovel']);
	unset($_SESSION['classificacao']);
	unset($_SESSION['tipo_aquisicao']);
	unset($_SESSION['entidade_fornecedora']);
	unset($_SESSION['data_operacao']);
	unset($_SESSION['localizacao']);
	
	unset($_SESSION['control_aba']);
	header("Location: cadastrar_seguro_intangivel.php");
?>