<?php
//conexao com o pdo
//OBS: function- este comando faz com que não apresenta aparece o erro na conexão mesmo tendo

function conectar(){
try{
$conn = new PDO("mysql:HOST=localhost; dbname=sipat","root","");
   
}catch(PDOException $e){
   
    echo "Erro encontrado ".$e->getMessage(). " com o codigo".$e->getCode();
}
return $conn;
}
 
?>