
<?php
require "conexao.php";

if(isset($_POST['enviar'])):

    //prinome,ultnome bem como cat -são nomes dos campos do formulario
$pri_nome = addslashes($_POST['prinome']);
$ult_nome = addslashes($_POST['ultnome']);
$email = addslashes($_POST['emai']);
$senha1 = addslashes($_POST['senha']);
$senha2 = addslashes($_POST['redsenha']);
$categoria = addslashes($_POST['cat']);
//$id = $_POST['id'];

if($senha1!=$senha2){
    
  echo "<script>alert('Digitou uma senha de confirmacao errada!')</script>";
        echo "<script>window.location='Login.php'</script>";
    die();
	}

    
if(!empty($pri_nome) AND !empty($ult_nome) AND !empty($email) AND !empty($senha1) AND !empty($senha2) AND !empty($categoria)):
   // $senha1=  base64_encode($senha1);
  //  $senha2=  base64_encode($senha2);
    $pdo = conectar();
    
    //faz o preparo para actualizar no banco
    $actualizar = $pdo->prepare("UPDATE utilizador SET prinome=:$pri_nome, ultnome=:$ult_nome, emai=:$email, senha=:$senha1, repetsenha=:$senha2, categoria=:$categoria WHERE ID = :id");

 //   $actualizar->bindValue(":nm",$pri_nome);
//    $actualizar->bindValue(":ultn",$ult_nome);
//    $actualizar->bindValue(":ema",$email);
//    $actualizar->bindValue(":sn",$senha1);
//    $actualizar->bindValue(":repsn",$senha2);
//    $actualizar->bindValue(":catg",$categoria);
    //$actualizar->bindValue(":id",$id);
    
    //executa a actualização
    $actualizar->execute();                
        
       //  echo $_POST['filme'];
        
        if($actualizar->rowCount() > 0):
            echo "<script>alert('Cadastro actualizado com sucesso')</script>";
        echo "<script>window.location='actCadAdmin.php'</script>";
           // echo "actualizado com sucesso !";
            else:
           //     echo "Erro ao actualizar";
            echo "<script>alert(' Erro! ao actualizar')</script>";
        echo "<script>window.location='actCadAdmin.php'</script>";
        endif;  //rowCount
        
        else: //else empty
            //se estiver qualquer campo vazio, mostra mensagem de erro 
            echo "<script>alert('Todos campos devem ser preenchidos')</script>";
        echo "<script>window.location='actCadAdmin.php'</script>";
                
    endif; //if empty
    
endif;   // if isset post enviar    
?>
