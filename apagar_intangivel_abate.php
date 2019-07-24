<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
	$pegar_intangivel = "INSERT INTO abate_intangivel WHERE id='$id' 
	SELECT * FOM bemintangivel ";
	$resultado = mysqli_query($conn, $pegar_intangivel);
	

	
	if(mysqli_affected_rows($conn)){
		$_SESSION['msg'] = "<p style='color:green;'>Bem apagado com sucesso</p>";
		header("Location: funcao_intangivel.php");
	}else{
		
		$_SESSION['msg'] = "<p style='color:red;'>Erro o bem não foi apagado com sucesso</p>";
		header("Location: index.php");
	}
}else{	
	$_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um Bem</p>";
	header("Location: funcao_intangivel.php");
}
