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
				<h2>Lista de Bens Imoveis</h2>
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
	echo "<span class='page-link'><a href='#' onclick='listar_imovel(1, $qtd_pag)'>Primeira</a> </span>";
	echo '</li>';
	for ($pag_ant = $pag - $max_links; $pag_ant <= $pag - 1; $pag_ant++) {
		if($pag_ant >= 1){
			echo "<li class='page-item'><a class='page-link' href='#' onclick='listar_imovel($pag_ant, $qtd_pag)'>$pag_ant </a></li>";
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
			echo "<li class='page-item'><a class='page-link' href='#' onclick='listar_imovel($pag_dep, $qtd_pag)'>$pag_dep</a></li>";
		}
	}
	echo '<li class="page-item">';
	echo "<span class='page-link'><a href='#' onclick='listar_imovel($quantidade_pg, $qtd_pag)'>Última</a></span>";
	echo '</li>';
	echo '</ul>';
	echo '</nav>';
	 

//+++++++++++++++++++++++++++++++++++++ FIM Paginação ++++++++++++++++++++++++++++++++++
			   
		//Selecionar os dados da tabela bemimovel endereço e seguro 
		$pegar = "SELECT * FROM bemimovel 
		LEFT OUTER JOIN endereco
		ON endereco.id_imovel = bemimovel.id
		LEFT OUTER JOIN seguro_imovel ON seguro_imovel.id_imovel = bemimovel.id  LIMIT $inicio, $qtd_pag ";
		$resultado = mysqli_query($conn, $pegar);
		
		//Verificar se encontrou resultado nas tabelas 
		if(($resultado) AND ($resultado->num_rows!=0)){	?>
			 	
			  
			      <div class="col">
				  <?php
				  while($rows_imovel = mysqli_fetch_assoc($resultado)){
				  ?> 
			       <table class="table table-responsive-md table-hover" border="1px solid black">
				   <tr>
				   <td><strong>Código:</strong></td>
				   <td><strong>Designação:</strong></td>
				   <td><strong>Tipo de Imóvel:</strong></td>
				   <td><strong>Tipo de Aquisição:</strong></td>
				   </tr>

				   <tr>
				   <td><?php echo $rows_imovel['codigo']; ?></td>
				   <td><?php echo $rows_imovel['designacao']; ?></td>
				   <td><?php echo $rows_imovel['tipo_imovel']; ?></td>
				   <td><?php echo $rows_imovel['tipo_aquisicao']; ?></td>
				   </tr>
				   
				   <tr>
				   <td><strong>Entidade Forenecidora:</strong></td>
				   <td><strong>Data de Entrada em Operação:</strong></td>
				   <td><strong>País:</strong></td>
				   <td><strong>Província:</strong></td>
				   </tr>
				   
				   <tr>
				   <td><?php echo $rows_imovel['entidade_fornecedora']; ?></td>
				   <td><?php echo $rows_imovel['data_operacao']; ?></td>
				   <td><?php echo $rows_imovel['pais']; ?></td>
				   <td><?php echo $rows_imovel['provincia']; ?></td>
				   </tr>
				   
				   <tr>
				   <td><strong>Cidade:</strong></td>
				   <td><strong>Município:</strong></td>
				   <td><strong>Bairro:</strong></td>
				   <td><strong>Rua:</strong></td>
				   </tr>
				   
				   <tr>
				   <td><?php echo $rows_imovel['cidade']; ?></td>
				   <td><?php echo $rows_imovel['municipio']; ?></td>
				   <td><?php echo $rows_imovel['bairro']; ?></td>
				   <td><?php echo $rows_imovel['rua']; ?></td>
				   </tr>
				   
				   <tr>
				   <td><strong>Domínio:</strong></td>
				   <td><strong>Proprietário:</strong></td>
				   <td><strong>Periodo de Afetação:</strong></td>
				   <td><strong>Custo de Aquisição:</strong></td>
                   </tr>
				  
				   <tr>
				   <td><?php echo $rows_imovel['dominio']; ?></td>
				   <td><?php echo $rows_imovel['proprietario']; ?></td>
				   <td><?php echo $rows_imovel['periodo_afetacao']; ?></td>
				   <td><?php echo $rows_imovel['custo_aquisicao']; ?></td>
				   </tr>
				    
				   <tr>
				   <td><strong>Despesa de Compra Incluida:</strong></td>
				   <td><strong>Classificação da Despesa:</strong></td>
				   <td><strong>Valor Mensal:</strong></td>
				   <td><strong>Vida Útil:</strong></td>
                   </tr>
				   
				   <tr>
				   <td><?php echo $rows_imovel['despesa_compra']; ?></td>
				   <td><?php echo $rows_imovel['classificacao_despesa']; ?></td>
				   <td><?php echo $rows_imovel['valor_mensal']; ?></td>
				   <td><?php echo $rows_imovel['vida_util']; ?></td>
				   </tr>
					
				   <tr>
				   <td><strong>Conservatória:</strong></td>
				   <td><strong>Tipo de Construção:</strong></td>
				   <td><strong>Nº de Piso:</strong></td>
				   <td><strong>Área:</strong></td>
                   </tr>
				   
				   <tr>
				   <td><?php echo $rows_imovel['conservatoria']; ?></td>
				   <td><?php echo $rows_imovel['tipo_construcao']; ?></td>
				   <td><?php echo $rows_imovel['piso_num']; ?></td>
				   <td><?php echo $rows_imovel['area']; ?></td>
				   </tr>
					
					<tr>
				   <td><strong>Ano da Construção:</strong></td>
				   <td><strong>Estado de Conservação:</strong></td>
				   <td><strong>Valor do Património:</strong></td>
				   <td><strong>Tipo de Contrato:</strong></td>
                   </tr>
				   
				   <tr>
				   <td><?php echo $rows_imovel['construcao_ano']; ?></td>
				   <td><?php echo $rows_imovel['estado_conservacao']; ?></td>
				   <td><?php echo $rows_imovel['valor_patrimonio']; ?></td>
				   <td><?php echo $rows_imovel['contrato']; ?></td>
				   </tr>
					
					<tr>
			    	<td><strong>Data de Ínico :<?php echo $rows_imovel['data_inicio']; ?></strong></td>
					<td><strong>Data de Fim :<?php echo $rows_imovel['data_fim']; ?></strong></td>
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
				   <td><?php echo $rows_imovel['apolice_num']; ?></td>
				   <td><?php echo $rows_imovel['data']; ?></td>
				   <td><?php echo $rows_imovel['riscos_cobertos']; ?></td>
				   <td><?php echo $rows_imovel['valor']; ?></td>
				   </tr>
				   
				   <tr>
				   <td><strong>Seguradora:</strong></td>
				   <td><?php echo $rows_imovel['seguradora']; ?></td>
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