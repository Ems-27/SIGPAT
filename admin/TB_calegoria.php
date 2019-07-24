<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<head>
      <?php 
        include_once("../conexao.php");
        session_start();
       ?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Formulario de Inscricao de Convidado</title>
</head>

    <?php
//require "conexao.php";

if(isset($_POST['enviar'])):
    
$categoria       = addslashes($_POST['categoria']);    

        
    
if(!empty($nome)){
    
    $pdo = conectar();
    
    //faz o preparo para gravar no banco
    $gravar = $pdo->prepare("INSERT INTO categoria(categoria) VALUES(:cat)");
    $gravar->bindValue(":cat",$categoria);
    
    
    $verifica->execute();        
    if($verifica->rowCount() == 1){
    //se o nome existe apresenta a mensagem de erro   
        echo "<script>alert(' Erro! o convidado $nome, ja existe no banco')</script>";
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
    <td><br/><h3 align="center"><u>Formulario de Inscri&ccedil;&atilde;o de Convidado</u></h3>
      <table width="600" border="0" align="center">
  <tr>
    <td>
        
        <p><strong>Categoria:</strong> 
		<input type="text" name="nom" id="text" size="80" maxlength="50" class="form-control">
		  <br/><p>
		  
		  <strong>Disponibilidade:</strong> 
		  <input type="text" name="naci" id="text" size="40" maxlength="20" class="form-control">
		  <p>
                  
                   <strong>Estado:</strong> 
		  <input type="text" name="naci" id="text" size="40" maxlength="20" class="form-control">
		  <p>
                  
                   <strong>Sala:</strong> 
		  <input type="text" name="naci" id="text" size="40" maxlength="20" class="form-control">
		  <p>
                  
                  
                  
		  <strong>Evento:</strong>

                        <?php 
                             $pdo = conectar();
                             $escolher = $pdo->prepare("SELECT * FROM evento");
                             $escolher->execute();
                             $escolha = $escolher->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        
                        <select name="ev" class="form-control">
                            <option value="" selected="selected">Escolha um tema para inscrever o teu convidado</option>
                            
                              <?php
                              //obs: $v-significa valor ta como uma variavel
                                  foreach ($escolha as $v):
                              ?>   
                            <!-- ucwords mete as iniciais das letras em maiusculas -->  
                            <option value="<?php echo $v['nome'] ?>"><?php echo ucwords($v['nome']); ?></option>
                              <?php 
                                   endforeach;
                              ?>
                    </td>   </tr>

                  
		</p>
		       
		</td>
            
  </tr>
<td>
        <strong>Escolher Disponibilidade:</strong>
			<select id="arquivo" name="disp" class="form-control"><br />
			<!-- se metessemos a opcao value="", nos ia permitir escrevemos outro pais que nºao seja o da opção!-->
                                 <option>Selecione</option>
                                 <option>Disponivel</option>
				 <option>Indisponivel</option>  </td>
  </table> <br/>    
        <div align="right">
		<input type="submit" name="enviar" id="botao" value="Guardar">
		
    </div>
    <p>&nbsp;</p></td>

</form>
</body>
</html>
