<?php
include ("conexao.php");
?>

<!DOCTYPE html">
<html ">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SIGPAT | administrador</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/estilo.css" /> 
<link href="css/bootstrap.min.css" rel="stylesheet">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/ddaccordion.js"></script>
<script type="text/javascript">
ddaccordion.init({
	headerclass: "submenuheader", //Shared CSS class name of headers group
	contentclass: "submenu", //Shared CSS class name of contents group
	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
	mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
	defaultexpanded: [], //index of content(s) open by default [index1, index2, etc] [] denotes no content
	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
	animatedefault: false, //Should contents open by default be animated into view?
	persiststate: true, //persist state of opened contents within browser session?
	toggleclass: ["", ""], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["suffix", "<img src='images/plus.gif' class='statusicon' />", "<img src='images/minus.gif' class='statusicon' />"], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
	oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
	}
})
</script>

<script type="text/javascript" src="js/jconfirmaction.jquery.js"></script>
<script type="text/javascript">
	
	$(document).ready(function() {
		$('.ask').jConfirmAction();
	});
	
</script>

<script language="javascript" type="text/javascript" src="js/niceforms.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="css/niceforms-default.css" />

</head>
<body>

<div class = "navbar nav navbar-inverse navbar-fixed-top bg-light" >
			<div class="container">
            <img src="imagens/tpai" width="80" height="80" alt="">
			   <div>
			   <ul  class="nav navbar-nav">
			   <li><a href="ocorrencia.php"> Index </a></li>
			   <li><a href="#">Iventario</a></li>
			   <li><a href="listar-ocorrencias.php">Bens</a></li>
			   <li></li>
			   </ul>
			   </div>
			       
			</div>
		
		</div><br>

<div id="main_container">

	
    
    <div class="main_content">
    
                
                    
                                
    <div class="center_content">  
    
    <div class="left_content"> <br>
    
    	
            <div class="sidebarmenu">
            
                <a class="menuitem submenuheader" href="">Bens Moveis</a>
                <div class="submenu">
                    <ul>
                    <li><a href=index.php?link=1>Cadastrar</a></li>
                    <li><a href="">Listar Bem</a></li>
                    <li><a href="abate.php?link=3">Abater Bem</a></li>
                    </ul>
                </div>
                <a class="menuitem submenuheader" href="" >Bens Imoveis</a>
                <div class="submenu">
                    <ul>
                    <li><a href="">Cadastrar</a></li>
                    <li><a href="">Listar Bem</a></li>
                    <li><a href="">Abater Bem</a></li>
                    </ul>
                </div>
                <a class="menuitem submenuheader" href="">Veículo</a>
                <div class="submenu">
                    <ul>
                    <li><a href="">Cadastra Bem</a></li>
                    <li><a href="">Listar Bem</a></li>
                    <li><a href="">Abater Bem</a></li>
                    </ul>
                </div>
				
				<a class="menuitem submenuheader" href="">Bem Intagível</a>
                <div class="submenu">
                    <ul>
                    <li><a href=index.php?link=3>Cadastra</a></li>
                    <li><a href="">Listar</a></li>
                    </ul>
                </div>
				
               <a class="menuitem submenuheader" href="">Seguro</a>
                <div class="submenu">
                    <ul>
                    <li><a href="">Gestão de Seguro</a></li>
                    <li><a href="">Actualizar seguro</a></li>
                    </ul>
                </div>
				
				<a class="menuitem submenuheader" href="">Gestão de Compras</a>
                <div class="submenu">
                    <ul>
                    <li><a href="">Compras 1</a></li>
                    <li><a href="">Compras</a></li>
                    <li><a href="">Compras</a></li>
                    </ul>
                </div>
				
                <a class="menuitem" href="">Abate de bens</a>
      
            </div><!--Fim da sidebarmenu-->
        
    </div>  <!--Fim da left_content-->
   
	 
	 
	 <div class="right_content"> <br>
    
	 
	<?php
		 $link = $_GET["link"];
		 $pagina[1]="bem-vindo.php";
		 $pagina[2]="bemmovel.php";
		 $pagina[3]="bemintangivel.php";
		 
		 if(!empty($link)){
			 
			 if(file_exists($pagina[$link])){
				 
		   include $pagina[$link]; 
			 }else
				 echo "Pagina Inexistente";
			 
		 }?>
    	 
    </div>  <!--Fim da riht_content-->
 
            
                    
  </div>   <!--end of center content -->               
                    
                    
    
    
    <div class="clear"></div>
    </div> <!--end of main content-->
	
    <script src="js/jquery-1.11.3.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
    <div class="footer">
    
    
    
    </div>

</div>		
</body>
</html>