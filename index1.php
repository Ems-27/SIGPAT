

<?php
session_start();
include("conexao.php");
include_once("cabecalho1.php");

?>


<!DOCTYPE html>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>SIGPAT</title>
		<link rel="stylesheet" type="text/css" href="css/estilo3.css"/> 
	</head>
	
	<body>		
				
		<main>
			<div class="innertube">
			 
			 <!--<h1>Aqui vai o corpo do conteudo</h1> -->
			 <br>
			 <br>
			 <br>
			 <br>
			 
			 	  <?php
			  
		$link = $_GET["link"];
		$pagina[1] = "bem_vindo.php"; 
		$pagina[2] = "cadastrar_movel.php";
        $pagina[3] = "funcao_movel.php";	
		$pagina[5] = "cadastrar_imovel.php";
        $pagina[6] = "funcao_imovel.php";		
		$pagina[9] = "cadastrar_veiculo.php";
        $pagina[10] = "funcao_veiculo.php";		
		$pagina[12] = "cadastrar_intangivel.php";
		$pagina[13] = "funcao_intangivel.php";
		$pagina[14] = "funcao_intangivel_abate.php";
		$pagina[15] = "funcao_intangivel_abatidos.php";
		
		if(!empty($link)){
		 
         if(file_exists($pagina[$link])){
			 
			 include $pagina[$link];
		    } else echo "Pagina Inexistente!"; 		 
			
		}?>
			 
			 
				
			</div>
		</main>
	
		<nav id="nav">
			<div class="innertube">
			
			<div class="sidebarmenu">
                <a class="menuitem submenuheader" href="#">Bens Moveis</a>
                <div class="submenu">
                    <ul>
                    <li><a href="index.php?link=2">Cadastrar</a></li>
                    <li><a href="index.php?link=3">Listar Bem</a></li>
                    <li><a href="#">Abater Bem</a></li>
					<li><a href="#">Bens Abatidos</a></li>
                    </ul>
                </div>
                <a class="menuitem submenuheader" href="#" >Bens Imoveis</a>
                <div class="submenu">
                    <ul>
                    <li><a href="index.php?link=5">Cadastrar</a></li>
                    <li><a href="index.php?link=6">Listar Bem</a></li>
                    <li><a href="#">Abater Bem</a></li>
					<li><a href="#">Bens Abatidos</a></li>
                    </ul>
                </div>
                <a class="menuitem submenuheader" href="#">Veículo</a>
                <div class="submenu">
                    <ul>
                    <li><a href="index.php?link=9">Cadastra Bem</a></li>
                    <li><a href="index.php?link=10">Listar Bem</a></li>
                    <li><a href="#">Abater Bem</a></li>
					<li><a href="#">Bens Abatidos</a></li>
                    </ul>
                </div>
				
				<a class="menuitem submenuheader" href="#">Bem Intagível</a>
                <div class="submenu">
                    <ul>
                    <li><a href="index.php?link=12">Cadastra</a></li>
                    <li><a href="index.php?link=13">Listar</a></li>
					<li><a href="#">Abater Bens</a></li>
					<li><a href="#">Bens Abatidos</a></li>
                    </ul>
                </div>
                <a class="menuitem" href="#">Inventário</a>
      
            </div> <!--Fim sidebarmenu-->
			</div>
		</nav>
	
	</body>
</html>