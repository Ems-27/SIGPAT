 <?php
 
 include("cabecalho.php");
 include("conexao.php");
 session_start();
 /*controlar abas*/
 
 if(!isset($_SESSION['control_aba'])){
		$_SESSION['control_aba'] = 0;
	}
 ?>
		
		<div class="container theme-showcase" role="main">
			<div class="page-header">
				<h1>Ocorrência</h1>
			</div>	

             <div class="row espaco">
				<div class="pull-right">
					<a href="destroi_sessao.php"><button type='button' class='btn btn-sm btn-success'>Nova Ocorrência</button></a>
				</div>
			</div>			
			
			<?php
				if($_SERVER['REQUEST_METHOD']=='POST'){
					$request = md5(implode($_POST));
					if(isset($_SESSION['ultima_request']) && $_SESSION['ultima_request'] == $request){?>
						<div class="alert alert-danger" role="alert">Processou</div>
					<?php }elseif(!isset($_SESSION['ultimo_id'])){	
						$_SESSION['ultima_request'] = $request;
						$marca = $_POST['marca'];
						$modelo = $_POST['modelo'];
						$cor = $_POST['cor'];
						$matricula = $_POST['matricula'];
						$motor_num = $_POST['motor_num'];
						$_SESSION['marca'] = $marca;
						$_SESSION['modelo'] = $modelo;
						$_SESSION['cor'] = $cor;
						$_SESSION['matricula'] = $matricula;
						$_SESSION['motor_num'] = $motor_num;						
						$inserir_identificacao = "INSERT INTO identificacao (marca, modelo, cor, matricula, motor_num) VALUES ('$marca', '$modelo', '$cor', '$matricula','$motor_num')";
						$resultado_da_insercao= mysqli_query($conn,$inserir_identificacao);
						//ID da identificação inserida
						$ultimo_id = mysqli_insert_id($conn);
						$_SESSION['ultimo_id'] = $ultimo_id; ?>							
						<div class="alert alert-success" role="alert">Identificação inserida com sucesso</div>
						<?php $_SESSION['control_aba'] = 1;
					}
					
					if(isset($_POST['tipo'])){
						$id_ocorrencia_editar = $_SESSION['ultimo_id'];
						$tipo = $_POST['tipo'];
						$proprietario = $_POST['proprietario'];
						$provincia = $_POST['provincia'];
						$localizacao = $_POST['localizacao'];
						$data_ocorrencia = $_POST['data_ocorrencia'];
						$estado = $_POST['estado'];
						$inserir_ocorrencia = "INSERT INTO dados_ocorrencia (tipo, proprietario, provincia, localizacao, data_ocorrencia, estado, id_identificacao ) VALUES ('$tipo', '$proprietario', '$provincia', '$localizacao', '$data_ocorrencia', '$estado', '$id_ocorrencia_editar')";
						$resultado_ocorrencia = mysqli_query($conn, $inserir_ocorrencia);?>							
						<div class="alert alert-success" role="alert">Ocorrência Registada com Sucesso..!</div>
						<?php $_SESSION['control_aba'] = 3;
					}
				}
			?>
			
			<div>

			  <!-- Nav tabs -->
			  <ul class="nav nav-tabs" role="tablist">
				<li role="presentation"<?php if($_SESSION['control_aba'] == 0){ echo "class='active'"; } ?>>
				    <a href="#identificacao" aria-controls="identificacao" role="tab" data-toggle="tab">
				      Identificação
				    </a>
				</li>
				
				 <li role="presentation">
				    <?php if(isset($_SESSION['ultimo_id'])){
						
						?><a href="#dados-ocorrencia" aria-controls="dados-ocorrencia" role="tab" data-toggle="tab"><?php
					} else{
						?><a href="#" aria-controls="dados-ocorrencia" role="tab" data-toggle="tab"><?php
						
					} ?>
				   
				     Dados da Ocorrência
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
                                <label class="col-sm-2 control-label">Marca</label>
                                <div class="col-sm-10">
                                    <select type="text" name='marca' class="form-control" id="marca  
									value="<?php if(isset($_SESSION['marca'])){ echo $_SESSION['marca']; }?>">
									<option value = "Huindai">Hindai</option>
                                    <option value = "Kia">Kia</option>
                                    <option value = "Toyota">Toyota</option>
                                    <option value = "Suzik">Suzik</option>
									</select>
                                </div>
                            </div>
							
							<div class="form-group">
                              <label class="col-sm-2 control-label">Modelo</label>
                                <div class="col-sm-10">
                                    <select type="text" name='modelo' class="form-control" id="modelo" value="<?php if(isset($_SESSION['modelo'])){ echo $_SESSION['modelo']; }?>">
									<option value = "I10">I10</option>
                                    <option value = "Elantra">Elantra</option>
                                    <option value = "Accent">Accent</option>
                                    <option value = "I20">I20</option>
									<option value = "Corola">Corola</option>
                                    <option value = "Rav4">Rav4</option>
                                    <option value = "Picanto">Picanto</option>
                                    <option value = "Celeiro">Celeiro</option>
									</select>
                                </div>
                            </div>
							
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Cor</label>
                                   <div class="col-sm-10">
                                    <input type="text" name='cor' class="form-control" id="cor" value="<?php if(isset($_SESSION['cor'])){ echo $_SESSION['cor']; }?>">
                                </div>
                            </div>
							
							<div class="form-group">
                               <label class="col-sm-2 control-label">Matricula</label>
                                   <div class="col-sm-10">
                                    <input type="text" name='matricula' class="form-control" id="matricula" value="<?php if(isset($_SESSION['matricula'])){ echo $_SESSION['matricula']; }?>">
                                </div>
                            </div>
							
							<div class="form-group">
                                <label class="col-sm-2 control-label">Numero do Motor</label>
                                    <div class="col-sm-10">
                                      <input type="text" name='motor_num' class="form-control" id="motor_num" value="<?php if(isset($_SESSION['motor_num'])){ echo $_SESSION['motor_num']; }?>">
                                </div>
                            </div>
							
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success">Cadastrar</button>
                                </div>
                            </div>
                        </form>
					</div>
				</div>
				                            
                                            <!-- Endereço E Ocorrencia --> 
											
				 <div role="tabpanel"  
					<?php if($_SESSION['control_aba'] == 1){ 
						echo "class='tab-pane active'"; 
						}else{ 
							echo "class='tab-pane'"; 
						} ?> id="messages">
					<div style="padding-top:20px;">
					 <form class="form-horizontal"  action="" method="POST">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tipo</label>
                                <div class="col-sm-10">
                                    <input type="text" name='tipo' class="form-control" id="tipo" placeholder = "ex: furto,roubo,burla etc">
                                </div>
                            </div>
							 <div class="form-group">
                                <label class="col-sm-2 control-label">Proprietario</label>
                                <div class="col-sm-10">
                                    <input type="text" name='proprietario' class="form-control" id="proprietario">
                                </div>
                            </div>
                           
							
							 <div class="form-group">
                                <label class="col-sm-2 control-label">Província</label>
                                <div class="col-sm-10">
                                    <select  name='provincia' class="form-control" >
									
									<?php
									   $busca = "SELECT * FROM provincia ORDER BY nome ASC ";
									   $resultado = mysqli_query($conn,$busca);
									
									while($pegar_coluna = mysqli_fetch_row($resultado)){
										$nome = $pegar_coluna[0];
                                        $sigla = $pegar_coluna[1];										
										echo "<option value=$sigla>$nome</option>";
									}
									?>
								    </select>
								</div>
                            </div>
							
							<div class="form-group">
                                <label class="col-sm-2 control-label">Localização</label>
                                <div class="col-sm-10">
                                    <input type="text" name='localizacao' class="form-control" id="localizaco">
                                </div>
                            </div>
							
							<div class="form-group">
                                <label class="col-sm-2 control-label">Data da Ocorrencia</label>
                                <div class="col-sm-10">
                                    <input type="date" name='data_ocorrencia' class="form-control" id="data_ocorrencia" >
                                </div>
                            </div>
							
							<div class="form-group">
                                <label class="col-sm-2 control-label">Estado</label>
                                <div class="col-sm-10">
                                    <select type="text" name='estado' class="form-control" id="estado" >
									<option value ="Activo">Activo</option>
									<option value ="Inativo">Inativo</option>
									</select>
                                </div>
                            </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success">Cadastrar</button>
                                </div>
                            </div>
                        </form>
					</div>
				</div>
				
			  </div>

			</div>
		</div>
		
		
		
		<script src="js/jquery-1.11.3.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>