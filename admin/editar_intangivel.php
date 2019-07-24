 <?php
 
 include("cabecalho.php");
 include("conexao.php");
 //session_start();
 /*controlar abas*/
 
 $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
 $pegar = "SELECT * FROM bemintangivel WHERE id = '$id'";
 $resultado = mysqli_query($conn, $pegar);
 $percorrer = mysqli_fetch_assoc($resultado);
  
 if(!isset($_SESSION['control_aba'])){
		$_SESSION['control_aba'] = 0;
	}
 ?>
		
		<div class="container theme-showcase" role="main">
			<div class="page-header" width="100%">
				<h1>Editar Intangivel</h1>
			</div>	

			
			<div>

			  <!-- Tab panes -->
			  <div class="tab-content">
			  
			  
			      <!-- Identificação -->
				<div role="tabpanel"  
					<?php if($_SESSION['control_aba'] == 0){ 
						echo "class='tab-pane active'"; 
						}else{ 
							echo "class='tab-pane'"; 
						} ?> id="messages">
					<div style="padding-top:20px;">
					 <form class="form-horizontal"  action="processo_editar_intangivel.php" method="POST">
					 
					 <div class="form-group">
                       <input type="hidden" name='id' value="<?php echo $percorrer['id']; ?>">
                     </div>
							
                             <div class="form-group">
                                <label class="col-sm-2 control-label">Designação</label>
                                <div class="col-sm-10">
                                    <input type="text" name='designacao' class="form-control" id="designacao" value="<?php echo $percorrer['designacao']; ?>">
                                </div>
                            </div>
							
							
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tipo de Aquisição</label>
                                <div class="col-sm-10">
                                    <input type="text" name='tipo_aquisicao' class="form-control" id="tipo_aquisicao" value="<?php echo $percorrer['tipo_aquisicao']; ?>">
                                </div>
                            </div>
							
							<div class="form-group">
                                <label class="col-sm-2 control-label">Entidade Fornecedora</label>
                                <div class="col-sm-10">
                                    <input type="text" name='entidade_fornecedora' class="form-control" value="<?php echo $percorrer['entidade_fornecedora']; ?>">
                                </div>
                            </div>
							
							<div class="form-group">
                                <label class="col-sm-2 control-label">Notas Adicionais</label>
                                <div class="col-sm-10">
                                    <input type="text" name='notasadicionais' class="form-control"  value="<?php echo $percorrer['notasadicionais']; ?>">
                                </div>
                            </div>
							
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success">editar</button>
                                </div>
                            </div>
                        </form>
					</div>
				</div> <!-- Fim Identificação -->
			  </div> <!-- fim da class tab-content -->

			</div><!-- fim da div-->
		</div> <!-- fim da classe conteiner-->
		
		
		
		<script src="js/jquery-1.11.3.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>