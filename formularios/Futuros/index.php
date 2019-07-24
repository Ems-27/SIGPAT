
<?php
include("conexao.php");
include_once("cabecalho1.php");
session_start();

?>
  
    
<div class="conteiner">
<div class="principal">
     
		<br>
		<div class="rows"><!-- class rows-->
		    <div class="col-xs-6 col-md-2">
			  <div class="sidebarmenu">
            
                <a class="menuitem submenuheader" href="#">Bens Moveis</a>
                <div class="submenu">
                    <ul>
                    <li><a href="index.php?link=2">Cadastrar</a></li>
                    <li><a href="index.php?link=3">Listar Bem</a></li>
                    <li><a href=>Abater Bem</a></li>
					<li><a href=>Bens Abatidos</a></li>
                    </ul>
                </div>
                <a class="menuitem submenuheader" href="#" >Bens Imoveis</a>
                <div class="submenu">
                    <ul>
                    <li><a href="index.php?link=5">Cadastrar</a></li>
                    <li><a href="index.php?link=6">Listar Bem</a></li>
                    <li><a href=>Abater Bem</a></li>
					<li><a href=>Bens Abatidos</a></li>
					<li><a href=>Seguro</a></li>
                    </ul>
                </div>
                <a class="menuitem submenuheader" href="#">Veículo</a>
                <div class="submenu">
                    <ul>
                    <li><a href="index.php?link=9">Cadastra Bem</a></li>
                    <li><a href="index.php?link=10">Listar Bem</a></li>
                    <li><a href=>Abater Bem</a></li>
					<li><a href=>Bens Abatidos</a></li>
                    </ul>
                </div>
				
				<a class="menuitem submenuheader" href="#">Bem Intagível</a>
                <div class="submenu">
                    <ul>
                    <li><a href="index.php?link=12">Cadastra</a></li>
                    <li><a href="index.php?link=13">Listar</a></li>
					<li><a href="index.php?link=14">Abater Bens</a></li>
					<li><a href="index.php?link=15">Bens Abatidos</a></li>
                    </ul>
                </div>
				
               <a class="menuitem submenuheader" href="#">Seguro</a>
                <div class="submenu">
                    <ul>
                    <li><a href="">Gestão de Seguro</a></li>
                    <li><a href="">Actualizar seguro</a></li>
                    </ul>
                </div>
				
				
				
                <a class="menuitem" href=>Inventário</a>
      
            </div> <!--Fim sidebarmenu-->
			  
			</div>
		       <div class="col-xs-12 col-md-10" style="border: solid 1px #b0448c4d;">
		       
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
		</div> <!--Fim rows-->
		
		
		</div><!--Fim Principal-->
		<div> <!--Fim conteiner-->
		
		
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery-1.11.3.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>