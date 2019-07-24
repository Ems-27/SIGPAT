<?php
function listarUtilizador($tabela){
	
	$pdo=conectar();

//$sql="SELECT * FROM utilizador";  
//mysql_query($sql);

try{
	
	$listar=$pdo->prepare("SELECT * FROM $tabela");
	$listar->execute();
	$dados = $listar->fetchAll(PDO::FETCH_ASSOC);
	if ($listar->rowCount()>0){
		return $dados;
	}else{
		return false;
	}
}
catch (PDOException $e){
	echo "Erro ao listar".$e->getMessage();
	
}
	
}

function cadastro ($nome, $email, $senha){
	
	$pdo=conectar();
	
	try{
	$inserir=$pdo->prepare("INSERT INO utilizadores (utilizador_nome, utilizadores_email, utilizadores_senha) VALUE (?,?,?)");
		$inserir->bindValue(1, $nome);
		$inserir->bindValue(2, $email);
		$inserir->bindValue(3, $senha);
		$inserir->execute();
		
		if($inserir->rowCount()==1):
		return true;
		else:
		return false;
		endif;
}
catch (PDOException $e){
	echo"Erro ao listar".$e->getMessage();
	
}
	
	
}

?>