<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
	
	$inserir_identificacao = " SELECT * FROM bemintangivel, INSERT INTO abate_intangivel (notasadicionais, designacao, tipo_aquisicao, entidade_fornecedora), WHERE id='$id'";
	$resultado_da_insercao = mysqli_query($conn,$inserir_identificacao); 
	
	
	
	if(mysqli_affected_rows($conn)){
		$_SESSION['msg'] = "<p style='color:green;'>Bem apagado com sucesso</p>";
		header("Location: index.php?link=14");
	}else{
		
		$_SESSION['msg'] = "<p style='color:red;'>Erro o bem não foi apagado com sucesso</p>";
		header("Location: index.php");
	}
}else{	
	$_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um Bem</p>";
	header("Location: index.php?link=14");
}
