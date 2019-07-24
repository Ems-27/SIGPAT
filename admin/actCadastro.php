<?php 
     require "../conexao.php";
     session_start();
 
    $pdo = conectar();

    $id = $_GET['id'];
    
    $lista = $pdo->prepare("SELECT * FROM utilizador where id=$id");
    $lista->execute();

    $utilizador = $lista->fetchAll(PDO::FETCH_ASSOC);
       
?>      
    <?php
    foreach($utilizador as $utilizadores):  
    ?>
    

        
        <?php $utilizadores['id']; ?>
        <?php $utilizadores['prinome']; ?>
    
        <?php $utilizadores['ultnome']; ?>
        
        <?php $utilizadores['email']; ?>
        
        <?php $utilizadores['senha']; ?>
        
        <?php $utilizadores['repetsenha']; ?>
    
       
        
    
<?php   
endforeach;
?>


<!DOCTYPE html>
 <html lang="pt">

<!-- inicio HEAD -->
<head>
     <meta charset="UTF-8" />
    <title>Sistema de Gestão de Património</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     
     <!-- PAGE LEVEL STYLES -->
     <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/login.css" />
    <link rel="stylesheet" href="css/magic.css" />
    
</head>
    <!-- FIM HEAD -->

    <!-- INICIO DO CORPO DA PAGINA -->
<body align="center">
 
  
   <!-- O CONTEUDO DA PAGINA --> 
    <div class="container">
   
        <!-- DIV mãe -->
    <div class="tab-content">
     
               
        <!--3ª DIV  --- E PARA INSCREVER-SE -->
 <!--       <div id="signup" class="tab-pane">  é a responsavel por chamar as div  -->
            <form action="actCadast.php" class="form-signin" method="post" enctype="multipart/form-data">
                <p class="text-muted text-center btn-block btn btn-primary btn-rect">Actualizar Registo</p>
                
                <!-- <input type="text" name="filme" id="arquivo" /> -->
                 <input type="text" name="prinome" id="arquivo" placeholder="Primeiro Nome" class="form-control" value="<?php echo $utilizadores['prinome']; ?>" />
                 <input type="text" name="ultnome" id="arquivo" placeholder="Ultimo Nome" class="form-control" value="<?php echo $utilizadores['ultnome']; ?>"/>
<!--                <input type="text" placeholder="Nome de usuario" class="form-control" />       -->
                <input type="email" name="emai" id="arquivo" placeholder="Seu E-mail" class="form-control" value="<?php echo $utilizadores['email']; ?>"/>
                
                <br/>
                <input type="hidden" name="id" value="<?php echo $utilizadores['id']; ?>"></input>
                                              
                        <?php 
                             $pdo = conectar();
                             $escolher = $pdo->prepare("SELECT categoria FROM categoria ");
                             $escolher->execute();
                             $categoria = $escolher->fetchAll(PDO::FETCH_ASSOC);
                       
                        ?>
                
                
			<select id="arquivo" name="cat" class="form-control"><br />
                 
                            <option value="" selected="selected">Escolha uma categoria</option>
                            
                              <?php
                              //obs: $v-significa valor ta como uma variavel
                                  foreach ($categoria as $v):
                              ?>   
                            <!-- ucwords mete as iniciais das letras em maiusculas -->  
                            <option value="<?php echo $v['categoria'] ?>"><?php echo ucwords($v['categoria']); ?></option>
                              <?php 
                                   endforeach;
                              ?>
                        	 				 
			</select><p>   
                
                <!-- ver como fica -->
                <DIV class="text-center">
  
                </tr>
                <button class="btn text-muted text-center btn-success" type="submit" name="enviar" id="enviar">Actualizar</button>
                <a href="cadastro.php" class="btn text-muted text-center btn-success" type="submit" name="enviar" id="enviar">Sair</a>
            </form>
        </DIV>
    </div>
   
	  <!--FIM DO CONTEUDO DA PAGINA -->     
	      
      <!-- ROTEIROS DE NIVEL DA PAGINA -->
      <script src="assets/plugins/jquery-2.0.3.min.js"></script>
      <script src="assets/plugins/bootstrap/js/bootstrap.js"></script>
   <script src="assets/js/login.js"></script>
      <!--FIM DO ROTEIROS DE NIVEL DA PAGINA -->

</body>
    <!-- FIM DO CORPO DA PAGINA -->
</html>
