 <?php
 
 include("cabecalho.php");
 include("conexao.php");
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
					<a href="destroir_sessao_seguro.php"><button type='button' class='btn btn-sm btn-success'>Novo seguro</button></a>
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
						$apolice_num = $_POST['apolice_num'];
						$data = $_POST['data'];
						$riscos_cobertos = $_POST['riscos_cobertos'];
						$valor = $_POST['valor'];
						$seguradora = $_POST['seguradora'];
						$_SESSION['apolice_num'] = $apolice_num;
						$_SESSION['data'] = $data;
						$_SESSION['riscos_cobertos'] = $riscos_cobertos;
						$_SESSION['valor'] = $valor;
						$_SESSION['seguradora'] = $seguradora;
											
						$inserir_seguro = "INSERT INTO seguro (apolice_num, data, riscos_cobertos, valor, seguradora) VALUES ('$apolice_num', '$data', '$riscos_cobertos', '$valor', '$seguradora')";
						$resultado_da_insercao = mysqli_query($conn,$inserir_seguro);
						//ID da identificação inserida
						$ultimo_id = mysqli_insert_id($conn);
						$_SESSION['ultimo_id'] = $ultimo_id; ?>							
						<div class="alert alert-success" role="alert">Seguradoro com sucesso</div>
						<?php $_SESSION['control_aba'] = 1;
					}
					
					
				}
			?>
			
			<div>

			  <!-- Nav tabs -->
			  <ul class="nav nav-tabs" role="tablist">
				<li role="presentation"<?php if($_SESSION['control_aba'] == 0){ echo "class='active'"; } ?>>
				    <a href="#identificacao" aria-controls="identificacao" role="tab" data-toggle="tab">
				      Dados do seguro
				    </a>
				</li>
				
				</ul>


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
					 <form class="form-horizontal"  action="" method="POST">
					 
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nº de Apólice</label>
                                <div class="col-sm-10">
                                    <input type="text" name='apolice_num' class="form-control" id="apolice_num" value="<?php if(isset($_SESSION['apolice_num'])){ echo $_SESSION['apolice_num']; }?>">
                                </div>
                            </div>
							
							<div class="form-group">
                                <label class="col-sm-2 control-label">Data</label>
                                <div class="col-sm-10">
                                    <input type="date" name='data' class="form-control" id="data" value="<?php if(isset($_SESSION['data'])){ echo $_SESSION['data']; }?>">
                                </div>
                            </div>
							
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Riscos cobertos</label>
                                <div class="col-sm-10">
                                    <select  name='riscos_cobertos' class="form-control" id="riscos_cobertos" value="<?php if(isset($_SESSION['riscos_cobertos'])){ echo $_SESSION['riscos_cobertos']; }?>">
                                    <option value = "Danos causados a terceiros">Danos causados a terceiros</option>
                                    <option value = "Danos Próprios">Danos Próprios</option>
                                    <option value = "Roubo">Roubo</option>
								    </select>
								</div>
                            </div>
							
							<div class="form-group">
                                <label class="col-sm-2 control-label">Valor</label>
                                <div class="col-sm-10">
                                    <input type="text" name='valor' class="form-control" id="valor" value="<?php if(isset($_SESSION['valor'])){ echo $_SESSION['valor']; }?>">
                                </div>
                            </div>
							
							
							<div class="form-group">
                                <label class="col-sm-2 control-label">Seguradora</label>
                                <div class="col-sm-10">
                                    <input type="text" name='seguradora' class="form-control" id="seguradora" value="<?php if(isset($_SESSION['seguradora'])){ echo $_SESSION['seguradora']; }?>">
                                </div>
                            </div>
							
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success">Gravar</button>
                                </div>
                            </div>
                        </form>

					</div><!--Fim da div padding-->
				</div> <!--Fim Identificação-->
				                    
			  </div> <!-- fim da class tab-content -->

			</div><!-- fim da div-->
			
		</div> <!-- fim da classe conteiner-->
		
		
		
		<script src="js/jquery-1.11.3.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>