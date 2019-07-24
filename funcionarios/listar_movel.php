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
				<h1>Lista de Bens Moveis</h1>
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
			   
			   //+++++++++++++++++++++++++++++++++++++ Paginação ++++++++++++++++++++++++++++++++++		
			//Paginação - Somar a quantidade de usuários
    $pegar = "SELECT COUNT(id) AS num_resultado FROM bemintangivel";
    $resultado = mysqli_query($conn, $pegar);
    $row_pg = mysqli_fetch_assoc($resultado);
	
	//Quantidade de pagina
    $quantidade_pg = ceil($row_pg['num_resultado'] / $qtd_pag);

   //Limitar os link antes depois
    $max_links = 1;

   echo '<nav aria-label="paginacao">';
	echo '<ul class="pagination">';
	echo '<li class="page-item">';
	echo "<span class='page-link'><a href='#' onclick='listar_movel(1, $qtd_pag)'>Primeira</a> </span>";
	echo '</li>';
	for ($pag_ant = $pag - $max_links; $pag_ant <= $pag - 1; $pag_ant++) {
		if($pag_ant >= 1){
			echo "<li class='page-item'><a class='page-link' href='#' onclick='listar_movel($pag_ant, $qtd_pag)'>$pag_ant </a></li>";
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
			echo "<li class='page-item'><a class='page-link' href='#' onclick='listar_movel($pag_dep, $qtd_pag)'>$pag_dep</a></li>";
		}
	}
	echo '<li class="page-item">';
	echo "<span class='page-link'><a href='#' onclick='listar_movel($quantidade_pg, $qtd_pag)'>Última</a></span>";
	echo '</li>';
	echo '</ul>';
	echo '</nav>';
	 

//+++++++++++++++++++++++++++++++++++++ FIM Paginação ++++++++++++++++++++++++++++++++++
			   
			   
		//Secelionar os dados da tabela bemmovel e relacionar com o seguro 
		$pegar = "SELECT * FROM bemmovel 
		LEFT OUTER JOIN seguro_movel
		ON seguro_movel.id_movel = bemmovel.id LIMIT $inicio, $qtd_pag ";
		$resultado = mysqli_query($conn, $pegar);
		
		//Verificar se encontrou resultado nas tabelas 
		if(($resultado) AND ($resultado->num_rows!=0)){	?>
			 	
			  
			      <div class="col">
				  <?php
				  while($rows_movel = mysqli_fetch_assoc($resultado)){
				  ?> 
			       <table class="table table-responsive-md table-hover" border="1px solid black">
				   <tr>
				   <td><strong>Código:</strong></td>
				   <td><strong>Designação:</strong></td>
				   <td><strong>Tipo de Aquisição:</strong></td>
				   <td><strong>Entidade Fornecidora:</strong></td>
				   </tr>

				   <tr>
				   <td><?php echo $rows_movel['codigo']; ?></td>
				   <td><?php echo $rows_movel['designacao']; ?></td>
				   <td><?php echo $rows_movel['tipo_aquisicao']; ?></td>
				   <td><?php echo $rows_movel['entidade_fornecedora']; ?></td>
				   </tr>
				   
				   <tr>
				   <td><strong>Data de Entrada em Operação:</strong></td>
				   <td><strong>Localização:</strong></td>
				   <td><strong>Marca:</strong></td>
				   <td><strong>Modelo:</strong></td>
				   </tr>
				   
				   <tr>
				   <td><?php echo $rows_movel['data_operacao']; ?></td>
				   <td><?php echo $rows_movel['localizacao']; ?></td>
				   <td><?php echo $rows_movel['marca']; ?></td>
				   <td><?php echo $rows_movel['modelo']; ?></td>
				   </tr>
				   
				   <tr>
				   <td><strong>Cor:</strong></td>
				   <td><strong>Nº de Série:</strong></td>
				   <td><strong>Custo de Aquisição:</strong></td>
				   <td><strong>Despesa Incluida:</strong></td>
				   </tr>
				   
				   <tr>
				   <td><?php echo $rows_movel['cor']; ?></td>
				   <td><?php echo $rows_movel['serie_num']; ?></td>
				   <td><?php echo $rows_movel['custo_aquisicao']; ?></td>
				   <td><?php echo $rows_movel['despesa_compra']; ?></td>
				   </tr>
				   
				   <tr>
				   <td><strong>Classificação da Despesa:</strong></td>
				   <td><strong>Valor Mensal:</strong></td>
				   <td><strong>Vida Útil Estimada:</strong></td>
				   <td><strong>Data Último control:</strong></td>
                   </tr>
				  
				  <tr>
				   <td><?php echo $rows_movel['classificacao_despesa']; ?></td>
				   <td><?php echo $rows_movel['valor_mensal']; ?></td>
				   <td><?php echo $rows_movel['vida_util']; ?></td>
				   <td><?php echo $rows_movel['data_control']; ?></td>
				   </tr>
				    
					<tr>
			    	<td><strong>Estado de Conservação:<?php echo $rows_movel['estado_conservacao']; ?></strong></td>
					<td><strong>Está Operacional:<?php echo $rows_movel['operacionalidade']; ?></strong></td>
				    </tr>
					
				   <tr>
				   <td><strong>Seguro</strong></td>
				   </tr>
				   <tr>
				   <td><strong>Nº de Apólice:</strong></td>
				   <td><strong>Data:</strong></td>
				   <td><strong>Riscos Cobertos:</strong></td>
				   <td><strong>Valor:</strong></td>
				   </tr>
				   
				   <tr>
				   <td><?php echo $rows_movel['apolice_num']; ?></td>
				   <td><?php echo $rows_movel['data']; ?></td>
				   <td><?php echo $rows_movel['riscos_cobertos']; ?></td>
				   <td><?php echo $rows_movel['valor']; ?></td>
				   </tr>
				   
				   <tr>
				   <td><strong>Seguradora:</strong></td>
				   <td><?php echo $rows_movel['seguradora']; ?></td>
                   </tr>
				      <?php
		              }
	              ?>
				   </table> 
                  
						<?php
	 
	 
}else{
	echo "<div class='alert alert-danger' role='alert'>Nenhum bem encontrado encontrado!</div>";
}

		
	  ?>
 
				</div> <!-- fim da div col -->
			  </div> <!-- fim da class tab-content -->
			</div><!-- fim da div-->
		</div> <!-- fim da classe conteiner-->
		
		
		
		<script src="js/jquery-1.11.3.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>