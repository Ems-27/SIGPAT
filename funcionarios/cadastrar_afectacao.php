 <?php
 
 include("cabecalho.php");
 include("../conexao.php");
 //session_start();
 /*controlar abas*/
 
 if(!isset($_SESSION['control_aba'])){
		$_SESSION['control_aba'] = 0;
	}
 ?>
		
		<div class="container theme-showcase" role="main">
			<div class="page-header" width="100%">
				<h1>Seguro</h1>
			</div>	

             <div class="row espaco">
				<div class="pull-right">
					<a href="destroir_sessao_afectacao.php"><button type='button' class='btn btn-sm btn-success'>Novo</button></a>
				</div>
			</div>			
			
			<!--Dados do seguro-->
			<?php
				if($_SERVER['REQUEST_METHOD']=='POST'){
					$request = md5(implode($_POST));
					if(isset($_SESSION['ultima_request']) && $_SESSION['ultima_request'] == $request){?>
						<div class="alert alert-danger" role="alert">Processou</div>
					<?php }elseif(!isset($_SESSION['ultimo_id'])){	
						$_SESSION['ultima_request'] = $request;
						$funcionario = $_POST['funcionario'];
						$departamento = $_POST['departamento'];
						
						$_SESSION['funcionario'] = $funcionario;
						$_SESSION['departamento'] = $departamento;
											
						$inserir_afectacao = "INSERT INTO afectacao (funcionario, departamento) VALUES ('$funcionario', '$departamento')";
						$resultado_da_insercao = mysqli_query($conn,$inserir_afectacao);
						
						$ultimo_id = mysqli_insert_id($conn);
						$_SESSION['ultimo_id'] = $ultimo_id; ?>							
						<div class="alert alert-success" role="alert">Dados Inseridos Com Sucesso..! </div>
						<?php $_SESSION['control_aba'] = 1;
					}
					
					
				}
			?>
			
			<div>

			  <!-- Nav tabs -->
			  <ul class="nav nav-tabs" role="tablist">
				<li role="presentation"<?php if($_SESSION['control_aba'] == 0){ echo "class='active'"; } ?>>
				    <a href="#identificacao" aria-controls="identificacao" role="tab" data-toggle="tab">
				      Afetação
				    </a>
				</li>
				
				</ul>


			  <!-- Tab panes -->
			  <div class="tab-content">
			  
			  
			                                     <!-- Dados da afectação -->
				<div role="tabpanel"  
					<?php if($_SESSION['control_aba'] == 0){ 
						echo "class='tab-pane active'"; 
						}else{ 
							echo "class='tab-pane'"; 
						} ?> id="messages">
					<div style="padding-top:20px;">
					 <form class="form-horizontal"  action="" method="POST">
					 
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Funcionário</label>
                                <div class="col-sm-10">
                                    <input type="text" name='funcionario' class="form-control" id="funcionario" value="<?php if(isset($_SESSION['funcionario'])){ echo $_SESSION['funcionario']; }?>">
                                </div>
                            </div>
							
							<div class="form-group">
                                <label class="col-sm-2 control-label">Departamento</label>
                                <div class="col-sm-10">
                                    <input type="text" name='departamento' class="form-control" id="departamento" value="<?php if(isset($_SESSION['departamento'])){ echo $_SESSION['departamento']; }?>">
                                </div>
                            </div>
							
							<div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success">Gravar</button>
                                </div>
                            </div>
                        </form>

					</div><!--Fim da div padding-->    
			  </div> <!-- fim da class tab-content -->

			</div><!-- fim da div-->
			
		</div> <!-- fim da classe conteiner-->
		
		
		
		<script src="js/jquery-1.11.3.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>