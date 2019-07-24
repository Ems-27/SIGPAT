
<?php 
     require "conexao.php";
     session_start();
     
      //if(isset($_GET['id'])):

//$id = $_GET['id'];
//if(isset($_GET['id'])){

// $id = $_GET['id'];}

 
    $pdo = conectar();

  //  $id = $_GET['id'];
    $lista = $pdo->prepare("SELECT * FROM utilizador where id=?");
    $lista->execute(array($_SESSION['id_secao']));

    $utilizador = $lista->fetchAll(PDO::FETCH_ASSOC);
    
//endif;    
?>      
    <?php
    foreach($utilizador as $utilizadores):  
    ?>
    <tr>
<!--  <td color="blue">      -->
        
        <?php $utilizadores['id']; ?>
        <?php $utilizadores['prinome']; ?>
    
        <?php $utilizadores['ultnome']; ?>
        
        <?php $utilizadores['email']; ?>
        
        <?php $utilizadores['senha']; ?>
        
        <?php $utilizadores['repetsenha']; ?>
    
       <td>
        
    
<?php   
endforeach;
?>


<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="pt"> <!--<![endif]-->

<!-- inicio HEAD -->
<head>
     <meta charset="UTF-8" />
    <title>SIE-Sistema de Informaçao de Eventos | Pagina de Entrada</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
     <!-- PAGE LEVEL STYLES -->
     <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/login.css" />
    <link rel="stylesheet" href="assets/plugins/magic/magic.css" />
    <link rel="shortcut icon" href="imagem/uan" />
</head>
    <!-- FIM HEAD -->

    <!-- INICIO DO CORPO DA PAGINA -->
<body align="center">
 
    </marquee><marquee behavior="alternate" scrolldelay="300"><h1><small> SIE-Sistema de Informação de Eventos</small></h1></marquee>

   <!-- O CONTEUDO DA PAGINA --> 
    <div class="container">
    <div class="text-center">
        <img src="assets/img/logo.png" id="logoimg" alt=" Logo" />
    </div>
        <!-- DIV mãe -->
    <div class="tab-content">
     
               
        <!--3ª DIV  --- E PARA INSCREVER-SE -->
 <!--       <div id="signup" class="tab-pane">  é a responsavel por chamar as div  -->
            <form action="gravarActCad_Admin.php" class="form-signin" method="post" enctype="multipart/form-data">
                <p class="text-muted text-center btn-block btn btn-primary btn-rect">Preencha para se registar</p>
                
                <!-- <input type="text" name="filme" id="arquivo" /> -->
                 <input type="text" name="prinome" id="arquivo" placeholder="Primeiro Nome" class="form-control" value="<?php echo $utilizadores['prinome']; ?>" />
                 <input type="text" name="ultnome" id="arquivo" placeholder="Ultimo Nome" class="form-control" value="<?php echo $utilizadores['ultnome']; ?>"/>
<!--                <input type="text" placeholder="Nome de usuario" class="form-control" />       -->
                <input type="email" name="emai" id="arquivo" placeholder="Seu E-mail" class="form-control" value="<?php echo $utilizadores['email']; ?>"/>
                <input type="password" name="senha" id="arquivo" placeholder="Senha" class="form-control" value="<?php echo $utilizadores['senha']; ?>"/>
                <input type="password" name="redsenha" id="arquivo" placeholder="Redigite a senha" class="form-control" value="<?php echo $utilizadores['repetsenha']; ?>"/>
                <input type="hidden" name="id" value="<?php echo $utilizadores['id']; ?>"></input>
                
                Escolher Categoria:
                
                        <?php 
                             $pdo = conectar();
                             $escolher = $pdo->prepare("SELECT * FROM categoria ");
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
                <button class="btn text-muted text-center btn-success" type="submit" name="enviar" id="enviar">Cadastrar</button>
            </form>
        </DIV>
    </div>
   
        <!-- paginas para fazerem linkes-->
    <div class="text-center">
        <ul class="list-inline">
            <li><a class="text-muted" href="#signup" data-toggle="tab">Inscrever-se </a>|</li>
            <li><a class="text-muted" href="#login" data-toggle="tab">Entrar </a>|</li>
            <li><a class="text-muted" href="#forgot" data-toggle="tab">Esqueceu a senha </a>|</li>
<!--            <li><a class="text-muted" href="#signup" data-toggle="tab">Inscrever-se </a>|</li>  -->
            <a href="cadastro.php">Sair</a>  
            
            
        </ul>
                
    </div>


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
