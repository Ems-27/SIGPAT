 <?php
 
 include("cabecalho.php");
 include("conexao.php");
 
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
  
 $pegar = "SELECT * FROM bemintangivel ORDER BY id DESC";
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
		  </tr>
		  
		  <?php
		  }
	  ?>
	  
	  </tbody>
	 </table>
	 <?php 
	 
 }else{
	 
	 echo "<div class='alert alert-danger' role='alert'> Nenhum bem intangível encontrado!</div>";
 }
 ?>
					
				
			  </div> <!-- fim da class tab-content -->

			</div><!-- fim da div-->
		</div> <!-- fim da classe conteiner-->
		
		
		
		<script src="js/jquery-1.11.3.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>