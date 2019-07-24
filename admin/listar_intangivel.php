 <?php
 
 include("cabecalho.php");
 include("../conexao.php");
 
 /*controlar abas*/
 
 if(!isset($_SESSION['control_aba'])){
		$_SESSION['control_aba'] = 0;
	}
 ?>
    
		
		
		<div class="container theme-showcase" role="main">
			<div class="page-header" width="100%">
				<h1>Lista de Bens Intangiveis</h1>
			</div>
			
			<div>

			  <!-- Tab panes -->
			  <div class="tab-content">
			  
			
			  
  <?php
  
               if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
			    unset($_SESSION['msg']);				                                    
			}  
  
  $pag = filter_input(INPUT_POST, 'pag', FILTER_SANITIZE_NUMBER_INT);
  $qtd_pag = filter_input(INPUT_POST, 'qtd_pag', FILTER_SANITIZE_NUMBER_INT);
  
  //calcular o inicio visualização
$inicio = ($pag * $qtd_pag) - $qtd_pag;
   
  // Buscar os dados na base de dados
 $pegar = "SELECT * FROM bemintangivel ORDER BY id DESC LIMIT $inicio, $qtd_pag";
 $resultado = mysqli_query($conn,$pegar);
 
 //Verificar se encontrou resultado na tabela "Ocorrência"
 
 if(($resultado) AND ($resultado->num_rows!=0)){
	 ?> 
	
	 <table class="table table-striped table-hover">
	      <thead>
	         <tr>
	           <!--<th>Tipo de ocorrencia</th>-->
	           <th>Designação</th>
	           <th>Tipo de Aquisição</th>
	           <th>Entidade Fornecedora</th>
	           <th>Notas Adicionais</th>
	        </tr>
			
	     </thead>
		       
	 
	  <tbody>
	  <?php 
	  while($rows_intangivel = mysqli_fetch_assoc($resultado)){
		  ?>
		  
		  <tr>
		  <th><?php echo $rows_intangivel['designacao']; ?></th>
		  <th><?php echo $rows_intangivel['tipo_aquisicao']; ?></th>
		  <th><?php echo $rows_intangivel['entidade_fornecedora']; ?></th>
		  <th><?php echo $rows_intangivel['notasadicionais']; ?></th>
		  <th><?php echo "<a href='editar_intangivel.php?id=" . $rows_intangivel['id'] . "'>Editar</a>"; ?></th>
		  </tr>
		  
		  <?php
		  }
		  
		  ?>
	  
	  </tbody>
	 </table>
	
	
 
    <!--Paginação-->
	
	<?php
	 
	 //Paginação - Somar a quantidade de usuários
    $pegar = "SELECT COUNT(id) AS num_resultado FROM bemintangivel";
    $resultado = mysqli_query($conn, $pegar);
    $row_pg = mysqli_fetch_assoc($resultado);
	
	//Quantidade de pagina
    $quantidade_pg = ceil($row_pg['num_resultado'] / $qtd_pag);

   //Limitar os link antes depois
    $max_links = 2;

   echo '<nav aria-label="paginacao">';
	echo '<ul class="pagination">';
	echo '<li class="page-item">';
	echo "<span class='page-link'><a href='#' onclick='listar_intangivel(1, $qtd_pag)'>Primeira</a> </span>";
	echo '</li>';
	for ($pag_ant = $pag - $max_links; $pag_ant <= $pag - 1; $pag_ant++) {
		if($pag_ant >= 1){
			echo "<li class='page-item'><a class='page-link' href='#' onclick='listar_intangivel($pag_ant, $qtd_pag)'>$pag_ant </a></li>";
		}
	}

 //echo " $pag ";

echo '<li class="page-item active">';
	echo '<span class="page-link">';
	echo "$pag";
	echo '</span>';
	echo '</li>';

for ($pag_dep = $pag + 1; $pag_dep <= $pag + $max_links; $pag_dep++) {
		if($pag_dep <= $quantidade_pg){
			echo "<li class='page-item'><a class='page-link' href='#' onclick='listar_intangivel($pag_dep, $qtd_pag)'>$pag_dep</a></li>";
		}
	}
	echo '<li class="page-item">';
	echo "<span class='page-link'><a href='#' onclick='listar_intangivel($quantidade_pg, $qtd_pag)'>Última</a></span>";
	echo '</li>';
	echo '</ul>';
	echo '</nav>';
	 
}else{
	echo "<div class='alert alert-danger' role='alert'>Nenhum bem encontrado encontrado!</div>";
}

		
	  ?>
					
	<!--Fim Paginação-->	
	
			  </div> <!-- fim da class tab-content -->
			</div><!-- fim da div-->
		  </div> <!-- fim da classe conteiner-->
		<script src="js/jquery-1.11.3.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>