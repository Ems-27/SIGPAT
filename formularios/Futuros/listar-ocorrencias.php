
<?php
include("conexao.php");
include("cabecalho.php");


  
 
 
 $pegar = "SELECT * FROM identificacao ORDER BY id DESC";
 $resultado = mysqli_query($conn,$pegar);
 
 //Verificar se encontrou resultado na tabela "Ocorrência"
 
 if(($resultado) AND ($resultado->num_rows!=0)){
	 ?> 
	 <table class="table table-striped table-hover">
	      <thead>
	         <tr>
	           <!--<th>Tipo de ocorrencia</th>-->
	           <th>Marca</th>
	           <th>Modelo</th>
	           <th>Cor</th>
	           <th>Matricula</th>
	           <th>Numero do Motor</th>
	           <!--<th>Proprietario</th>-->
	           <!--<th>Província</th>-->
	           <!--<th>localização</th>-->
	           <!--<th>Data da Ocorrência</th>-->
	           <!--<th>Estatu</th>-->
			   
	        </tr>
			
	     </thead>
		       
	 
	  <tbody>
	  <?php 
	  while($rows_ocorrencia = mysqli_fetch_assoc($resultado)){
		  ?>
		  
		  <tr>
		 <!-- <th> <?php echo $rows_ocorrencia['tipo']; ?></th>-->
		  <th><?php echo $rows_ocorrencia['marca']; ?></th>
		  <th><?php echo $rows_ocorrencia['modelo']; ?></th>
		  <th><?php echo $rows_ocorrencia['cor']; ?></th>
		  <th><?php echo $rows_ocorrencia['matricula']; ?></th>
		  <th><?php echo $rows_ocorrencia['motor_num']; ?></th>
		  <!--<th><?php echo $rows_ocorrencia['proprietario']; ?></th>-->
		  <!--<th><?php echo $rows_ocorrencia['provincia']; ?></th>-->
		  <!--<th><?php echo $rows_ocorrencia['localizacao']; ?></th>-->
		  <!--<th><?php echo $rows_ocorrencia['data_ocorrencia']; ?></th>-->
		  <!--<th><?php echo $rows_ocorrencia['estado']; ?></th>-->
		  <td>
		   <a href="remove-produto.php" class="text-danger">Rm</a>
	      </td>
		  </tr>
		  
		  <?php
		  }
	  ?>
	  
	  </tbody>
	 </table>
	 <?php 
	 
 }else{
	 
	 echo "<div class='alert alert-danger' role='alert'> Nenhuma Ocorrência encontrada!</div>";
 }
 ?>
 
  
		
		
		<script src="js/jquery-1.11.3.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
