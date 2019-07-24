<?php 
     require "conexao.php";
    // session_start();
?>

<!DOCTYPE html>
 <html lang="pt-pt">

<!-- inicio HEAD -->
<head>
     <meta charset="UTF-8" />
    <title>SIE-Sistema de Informaçao de Eventos | Pagina de Entrada</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
        
     <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/login.css" />
    <link rel="stylesheet" href="css/magic.css" />
    
    
</head>
   
<body align="center">
 
    <div class="container">
    
    <div class="tab-content">
                    
        <!--1ª DIV -->
        <div id="login" class="tab-pane active">
            <form action="conLogin1.php" class="form-signin" method="post" enctype="multipart/form-data">
                <p class="text-muted text-center btn-block btn btn-primary btn-rect">
                <marquee behavior="alternate">Entra com a tua senha</marquee>
                </p>
                <input type="text" name="email" id="arquivo" placeholder=" Email" class="form-control" />
                <input type="password" name="senha" id="arquivo" placeholder="Senha" class="form-control" />
                
                <!--  exemplo  -->
                
               
                    <td>
                    Administrador
                    <input type="radio" name="categoria" value="admin" checked="checked" />
                    |
                    Funcionário
                    <input type="radio" name="categoria" value="funcionario" checked="checked" />
                    
                    </td>
              </tr>
                
                
                
                <button class="btn text-muted text-center btn-danger" type="submit" name="conLogin1" id="enviar">Entrar</button>   
         
            </form>
        </div>
                <DIV class="text-center">
  
                </tr>
                  </form>
        </DIV>
    </div>
   
        <!-- paginas para fazerem linkes-->
    <div class="text-center">
        <ul class="list-inline">
           
            <li><a class="text-muted" href="cadastrar_utilizador.php" data-toggle="tab">Inscrever-se </a>|</li>
            <a href="index.php">Sair</a>  
     
        </ul>
                
    </div>

</div>

	 
      <script src="assets/plugins/jquery-2.0.3.min.js"></script>
      <script src="assets/plugins/bootstrap/js/bootstrap.js"></script>
   <script src="assets/js/login.js"></script>
     
</body>

</html>
