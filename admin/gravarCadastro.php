<?php
require "../conexao.php";

if(isset($_POST['enviar'])):

    //prinome,ultnome bem como cat -são nomes dos campos do formulario
$categoria = addslashes($_POST['cat']);
//$categoria = "ola";
    
if(!empty($categoria)){
    
    $pdo = conectar();
    
    //faz o preparo para gravar no banco
    $gravar = $pdo->prepare("INSERT INTO utilizador(categoria) VALUES(:catg)");
   
    $gravar->bindValue(":catg",$categoria);
        
        //se filme nçao existe grava no banco e exibe mensagem
         $gravar->execute();
         
         if($gravar->rowCount() > 0){
    //se filme existe apresenta a mensagem de erro    
    echo "<script>alert(' cadastrado com sucesso !')</script>";
        echo "<script>window.location='cadastro.php'</script>";
    }else{
         
       // echo "Cadastro efectuado com sucesso";
        echo "<script>alert('Erro ao Cadastrar !')</script>";
        echo "<script>window.location='cadastro.php'</script>";
    }    
}

endif;    
?>