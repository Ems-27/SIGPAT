<?php
require "conexao.php";

if(isset($_POST['enviar'])):

    //prinome,ultnome bem como cat -são nomes dos campos do formulario
$pri_nome = addslashes($_POST['prinome']);
$ult_nome = addslashes($_POST['ultnome']);
$email = addslashes($_POST['emai']);
$senha1 = addslashes($_POST['senha']);
$senha2 = addslashes($_POST['redsenha']);

if($senha1!=$senha2){
    
  echo "<script>alert('Digitou uma senha de confirmacao errada!')</script>";
        echo "<script>window.location='Login.php'</script>";
    die();
	}

    
if(!empty($pri_nome) AND !empty($ult_nome) AND !empty($email) AND !empty($senha1) AND !empty($senha2)){
    $senha1=  base64_encode($senha1);
    $senha2=  base64_encode($senha2);
    $pdo = conectar();
    
    //faz o preparo para gravar no banco
    $gravar = $pdo->prepare("INSERT INTO utilizador(prinome,ultnome,email,senha,repetsenha) VALUES(:prin, :ultn, :ema, :sen, :repsen)");
    $gravar->bindValue(":prin",$pri_nome);
    $gravar->bindValue(":ultn",$ult_nome);
    $gravar->bindValue(":ema",$email);
    $gravar->bindValue(":sen",$senha1);
    $gravar->bindValue(":repsen",$senha2);
    
    //verifica se existe email igual
    
    $verifica = $pdo->prepare("SELECT email FROM utilizador WHERE email = :emai");
    $verifica->bindValue(":emai",$email);
    
    //executa o comando sql, para verififcar se filme ja existe
    $verifica->execute();        
    if($verifica->rowCount() == 1){
    //se filme existe apresenta a mensagem de erro    
    echo "<script>alert('Erro Email Existente, no banco !')</script>";
        echo "<script>window.location='Login.php'</script>";
    }else{
        //se filme nçao existe grava no banco e exibe mensagem
         $gravar->execute();
       // echo "Cadastro efectuado com sucesso";
        echo "<script>alert('Cadastro efectuado com sucesso !')</script>";
        echo "<script>window.location='Login.php'</script>";
    }    
}

else{
    //Alerta pra se preencher todos os campos
     
        echo "<script>alert('Preencha todos os campos !')</script>";
        echo "<script>window.location='Login.php'</script>";
    
}   
endif;    
//}
?>
