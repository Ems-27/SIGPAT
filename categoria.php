<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<head>
      <?php
        require_once"conexao.php";
        
       ?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Criar categorias</title>
</head>

    <?php
//require "conexao.php";

if(isset($_POST['enviar'])):
    
//$id = addslashes($_POST['id']);    
$nome = addslashes($_POST['nome']);
if(!empty($nome)){
    
    $pdo = conectar();
    
    //faz o preparo para gravar no banco
    $gravar = $pdo->prepare("INSERT INTO categoria(nome) VALUES(:nome)");
//    $gravar->bindValue(":id",$id);
    $gravar->bindValue(":nome",$nome);
        
    //verifica se existe tema igual
    $verifica = $pdo->prepare("SELECT nome FROM categoria WHERE nome = :nome");
    $verifica->bindValue(":nome",$nome);
    //executa o comando sql, para verififcar se o nome ja existe
    $verifica->execute();        
    if($verifica->rowCount() == 1){
    //se o nome existe apresenta a mensagem de erro   
        echo "<script>alert(' Erro! Acategoria $nome, ja existe no banco')</script>";
   //     echo "<script>window.location='convidado.php'</script>";
    
    }else{
        //se tema não existe grava no banco e exibe mensagem
         $gravar->execute();
       // echo "Cadastro efectuado com sucesso";
        echo "<script>alert('Gravado com sucesso !')</script>";
  //      echo "<script>window.location='categoria.php'</script>";
    }    
}
endif;    
?>  

<body>
    
     <?php
            include_once 'cabecalho.php';
            ?>    
<form name="criar" method="post" action="" enctype="multipart/form-data">
<table width="700" border="1" align="center">
  <tr>
    <td><br/><h3 align="center"><u>Formulario de categorias</u></h3>
      <table width="600" border="0" align="center">
  <tr>
    <td>
        
        <p><strong>Nome:</strong> 
		<input type="text" name="nome" class="form-control">      
  </table> <br/>    
        <div align="right">
		<input type="submit" name="enviar" id="botao" value="Guardar">
		
    </div>
    <p>&nbsp;</p></td>

</form>
</body>
</html>
         