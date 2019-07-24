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
				<h1>Lista de Veículos</h1>
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
	echo "<span class='page-link'><a href='#' onclick='listar_veiculo(1, $qtd_pag)'>Primeira</a> </span>";
	echo '</li>';
	for ($pag_ant = $pag - $max_links; $pag_ant <= $pag - 1; $pag_ant++) {
		if($pag_ant >= 1){
			echo "<li class='page-item'><a class='page-link' href='#' onclick='listar_veiculo($pag_ant, $qtd_pag)'>$pag_ant </a></li>";
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
			echo "<li class='page-item'><a class='page-link' href='#' onclick='listar_veiculo($pag_dep, $qtd_pag)'>$pag_dep</a></li>";
		}
	}
	echo '<li class="page-item">';
	echo "<span class='page-link'><a href='#' onclick='listar_veiculo($quantidade_pg, $qtd_pag)'>Última</a></span>";
	echo '</li>';
	echo '</ul>';
	echo '</nav>';
	 

//+++++++++++++++++++++++++++++++++++++ FIM Paginação ++++++++++++++++++++++++++++++++++
			
			
		//Secelionar os dados da tabela Veiculo e relacionar com o seguro 
		$pegar = "SELECT * FROM veiculo
		LEFT OUTER JOIN seguro_veiculo
		ON seguro_veiculo.id_veiculo = veiculo.id LIMIT $inicio, $qtd_pag";
		$resultado = mysqli_query($conn, $pegar);
		
		//Verificar se encontrou resultado nas tabelas 
		if(($resultado) AND ($resultado->num_rows!=0)){	?>
			 	
			  
			      <div class="col">
				  <?php
				  while($rows_veiculo = mysqli_fetch_assoc($resultado)){
				  ?> 
			       <table class="table table-responsive-md table-hover " border="1px solid black">
				   <tr>
				   <td><strong>Código:</strong></td>
				   <td><strong>Designação:</strong></td>
				   <td><strong>Tipo de Aquisição:</strong></td>
				   <td><strong>Entidade Fornecidora:</strong></td>
				   </tr>

				   <tr>
				   <td><?php echo $rows_veiculo['codigo']; ?></td>
				   <td><?php echo $rows_veiculo['designacao']; ?></td>
				   <td><?php echo $rows_veiculo['tipo_aquisicao']; ?></td>
				   <td><?php echo $rows_veiculo['entidade_fornecedora']; ?></td>
				   </tr>
				   
				   <tr>
				   <td><strong>Data de Entrada em Operação:</strong></td>
				   <td><strong>Localização:</strong></td>
				   <td><strong>Matricula:</strong></td>
				   <td><strong>Marca:</strong></td>
				   </tr>
				   
				   <tr>
				   <td><?php echo $rows_veiculo['data_operacao']; ?></td>
				   <td><?php echo $rows_veiculo['localizacao']; ?></td>
				   <td><?php echo $rows_veiculo['matricula']; ?></td>
				   <td><?php echo $rows_veiculo['marca']; ?></td>
				   </tr>
				   
				   <tr>
				   <td><strong>Modelo:</strong></td>
				   <td><strong>Tipo de Combustível:</strong></td>
				   <td><strong>Cilindrada:</strong></td>
				   <td><strong>Nº de Cilindro:</strong></td>
				   </tr>
				   
				   <tr>
				   <td><?php echo $rows_veiculo['modelo']; ?></td>
				   <td><?php echo $rows_veiculo['combustivel']; ?></td>
				   <td><?php echo $rows_veiculo['cilindrada']; ?></td>
				   <td><?php echo $rows_veiculo['cilindro_num']; ?></td>
				   </tr>
				   
				   <tr>
				   <td><strong>Nº do Motor:</strong></td>
				   <td><strong>Nº do Chassis:</strong></td>
				   <td><strong>Quadro:</strong></td>
				   <td><strong>Cor:</strong></td>
                   </tr>
				  
				  <tr>
				   <td><?php echo $rows_veiculo['motor_num']; ?></td>
				   <td><?php echo $rows_veiculo['chassis_num']; ?></td>
				   <td><?php echo $rows_veiculo['quadro']; ?></td>
				   <td><?php echo $rows_veiculo['cor']; ?></td>
				   </tr>
				   
				   <tr>
				   <td><strong>Nº de Portas:</strong></td>
				   <td><strong>Capacidade de Carga:</strong></td>
				   <td><strong>Lotação:</strong></td>
				   <td><strong>Caixa:</strong></td>
                   </tr>
				  
				  <tr>
				   <td><?php echo $rows_veiculo['porta_num']; ?></td>
				   <td><?php echo $rows_veiculo['capacidade']; ?></td>
				   <td><?php echo $rows_veiculo['lotacao']; ?></td>
				   <td><?php echo $rows_veiculo['caixa']; ?></td>
				   </tr>
				    
					
				   <tr>
				   <td><strong>Entidade Proprietária:</strong></td>
				   <td><strong>Período de Afectação:</strong></td>
				   <td><strong>Conservatória:</strong></td>
				   <td><strong>Livro:</strong></td>
                   </tr>
				  
				   <tr>
				   <td><?php echo $rows_veiculo['entidade_proprietaria']; ?></td>
				   <td><?php echo $rows_veiculo['periodo_afetacao']; ?></td>
				   <td><?php echo $rows_veiculo['conservatoria']; ?></td>
				   <td><?php echo $rows_veiculo['livro']; ?></td>
				   </tr>
				   
				   <tr>
				   <td><strong>Ano de Fabrico:</strong></td>
				   <td><strong>Estado de Conservação:</strong></td>
				   <td><strong>Operacional:</strong></td>
				   <td><strong>Data do Último Control:</strong></td>
                   </tr>
				  
				   <tr>
				   <td><?php echo $rows_veiculo['ano_fabrico']; ?></td>
				   <td><?php echo $rows_veiculo['conservacao']; ?></td>
				   <td><?php echo $rows_veiculo['operacionalidade']; ?></td>
				   <td><?php echo $rows_veiculo['control']; ?></td>
				   </tr>
				   
				   <tr>
				   <td><strong>Custo de Aquisição:</strong></td>
				   <td><strong>Despesa da Compra:</strong></td>
				   <td><strong>Classificação da Despesa:</strong></td>
				   <td><strong>Valor Mensal:</strong></td>
                   </tr>
				  
				   <tr>
				   <td><?php echo $rows_veiculo['custo_aquisicao']; ?></td>
				   <td><?php echo $rows_veiculo['despesa_compra']; ?></td>
				   <td><?php echo $rows_veiculo['class_despesa']; ?></td>
				   <td><?php echo $rows_veiculo['valor_mensal']; ?></td>
				   </tr>
					
					<tr>
			    	<td><strong>Vida Útil:<?php echo $rows_veiculo['vida_util']; ?></strong></td>
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
				   <td><?php echo $rows_veiculo['apolice_num']; ?></td>
				   <td><?php echo $rows_veiculo['data']; ?></td>
				   <td><?php echo $rows_veiculo['riscos_cobertos']; ?></td>
				   <td><?php echo $rows_veiculo['valor']; ?></td>
				   </tr>
				   
				   <tr>
				   <td><strong>Seguradora:</strong></td>
				   <td><?php echo $rows_veiculo['seguradora']; ?></td>
                   </tr>
				      <?php
		              }
	              ?>
				   </table> 
                  
						 <?php 
	 
 }else{
	 
	 echo "<div class='alert alert-danger' role='alert'> Nenhum Veículo encontrado!</div>";
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