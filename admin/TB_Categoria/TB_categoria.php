<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<head>
      <?php 
        include_once("../../conexao.php");
        session_start();
       ?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Formulario de Inscricao de Convidado</title>
</head>

    <?php
//require "conexao.php";

if(isset($_POST['enviar'])):
    
$categoria       = addslashes($_POST['categoria']);    
$disponibilidade = addslashes($_POST['disponibilidade']);
$estado          = addslashes($_POST['estado']);
$sala            = addslashes($_POST['sala']);
        
    
if(!empty($categoria) AND !empty($disponibilidade) AND !empty($estado) AND !empty($sala)){
    
    $pdo = conectar();
    
    //faz o preparo para gravar no banco
    $gravar = $pdo->prepare("INSERT INTO categoria(categoria, disponibilidade, estado, sala) VALUES(:cat, :disp, :est, :sal)");
    $gravar->bindValue(":cat",$categoria);
    $gravar->bindValue(":disp",$disponibilidade);
    $gravar->bindValue(":est",$estado);
    $gravar->bindValue(":sal",$sala);
//    $gravar->bindValue(":dono",$_SESSION['id_secao']);
        
    //verifica se existe tema igual
    $verifica = $pdo->prepare("SELECT categoria FROM categoria WHERE categoria = :cat");
    $verifica->bindValue(":cat",$categoria);
    //executa o comando sql, para verififcar se o nome ja existe
    $verifica->execute();        
    if($verifica->rowCount() == 1){
    //se o nome existe apresenta a mensagem de erro   
        echo "<script>alert(' Erro! o convidado $categoria, ja existe no banco')</script>";
   //     echo "<script>window.location='convidado.php'</script>";
    
    }else{
        //se tema não existe grava no banco e exibe mensagem
         $gravar->execute();
       // echo "Cadastro efectuado com sucesso";
        echo "<script>alert('Gravado com sucesso !')</script>";
  //      echo "<script>window.location='convidado.php'</script>";
    }    
}

else{
    //Alerta pra se preencher todos os campos
     
        echo "<script>alert('Preencha todos os campos !')</script>";
    //    echo "<script>window.location='convidado.php'</script>";
    
}   
endif;    
?>           
            
<body>
    
    
<!-- <form action="" enctype="multipart/form-data" name="inserir" method="post">  -->
<br />
<br />
<form name="inserir" id="web" method="post" action="" enctype="multipart/form-data">
<table width="700" border="1" align="center">
  <tr>
    <td><br/><h3 align="center"><u>Formulario de Inscri&ccedil;&atilde;o de Categorias</u></h3>
      <table width="600" border="0" align="center">
  <tr>
    <td>
        
        <strong>Categoria:</strong><br> 
		<input type="text" name="categoria" id="text" size="40" maxlength="50" class="form-control">
		  <br/><p>
		  
                      <strong>Disponibilidade:</strong><br> 
		  <input type="text" name="disponibilidade" id="text" size="40" maxlength="20" class="form-control">
		  <p>
                  
                   <strong>Estado:</strong><br> 
		  <input type="text" name="estado" id="text" size="40" maxlength="20" class="form-control">
		  <p>
                  
                   <strong>Sala:</strong><br> 
		  <input type="text" name="sala" id="text" size="40" maxlength="20" class="form-control">
		  <p>
                  
                    </td>   </tr>

                  
		</p>
		       
		</td>
            
  </tr>

  </table> <br/>    
        <div align="right">
		<input type="submit" name="enviar" id="botao" value="Guardar">
                    
                <a href="../index.php"><input type="button" name="botao" id="botao" value="Sair"/></a>    
		
    </div>
    <p>&nbsp;</p></td>

</form>

</body>
</html>
