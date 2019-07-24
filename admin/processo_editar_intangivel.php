<?php

include_once("../conexao.php");

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$notasadicionais = filter_input(INPUT_POST, 'notasadicionais', FILTER_SANITIZE_STRING);
$designacao = filter_input(INPUT_POST, 'designacao', FILTER_SANITIZE_STRING);
$tipo_aquisicao = filter_input(INPUT_POST, 'tipo_aquisicao', FILTER_SANITIZE_STRING);
$entidade_fornecedora = filter_input(INPUT_POST, 'entidade_fornecedora', FILTER_SANITIZE_STRING);

//echo "notasadicionais: $notasadicionais <br>";
//echo "designacao: $designacao <br>";
//echo "tipo_aquisicao: $tipo_aquisicao <br>";
//echo "entidade_fornecedora: $entidade_fornecedora <br>";

$pegar = "UPDATE bemintangivel SET notasadicionais = '$notasadicionais', designacao = '$designacao', tipo_aquisicao = '$tipo_aquisicao', entidade_fornecedora = '$entidade_fornecedora', modified=NOW() WHERE id = '$id'";
$resultado = mysqli_query($conn, $pegar);

if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Bem editado com sucesso</p>";
	header("Location: funcao_intangivel.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Bem não foi editado com sucesso</p>";
	header("Location: editar_intangivel.php?id=$id");
}
