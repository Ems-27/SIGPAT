 <?php
 
 include("cabecalho.php");
 include_once("../conexao.php");
 //session_start();
 /*controlar abas*/
 
 if(!isset($_SESSION['control_aba'])){
		$_SESSION['control_aba'] = 0;
	}
 ?>
		
		<div class="container theme-showcase" role="main">
			<div class="page-header" width="100%">
				<h1>Cadastramento de Bem Intangível</h1>
			</div>	

             <div class="row espaco">
				<div class="pull-right">
					<a href="destroir_sessao_intangivel.php"><button type='button' class='btn btn-sm btn-success'>Novo Bem +</button></a>
				</div>
			</div>			
			
			<!--Identificação-->
           <?php
				if($_SERVER['REQUEST_METHOD']=='POST'){
					$request = md5(implode($_POST)); 
					if(isset($_SESSION['ultima_request']) && $_SESSION['ultima_request'] == $request){?>
						<div class="alert alert-danger" role="alert">Processou</div>
					<?php }elseif(!isset($_SESSION['ultimo_id'])){	//Identificação
						$_SESSION['ultima_request'] = $request;
						$notasadicionais = $_POST['notasadicionais'];
						$designacao = $_POST['designacao'];
						$tipo_aquisicao = $_POST['tipo_aquisicao'];
						$entidade_fornecedora = $_POST['entidade_fornecedora'];
						
						$_SESSION['notasadicionais'] = $notasadicionais;
						$_SESSION['designacao'] = $designacao;
						$_SESSION['tipo_aquisicao'] = $tipo_aquisicao;
						$_SESSION['entidade_fornecedora'] = $entidade_fornecedora;
											
						$inserir_identificacao = "INSERT INTO bemintangivel (notasadicionais, designacao, tipo_aquisicao, entidade_fornecedora) VALUES ('$notasadicionais', '$designacao', '$tipo_aquisicao', '$entidade_fornecedora')";
						$resultado_da_insercao = mysqli_query($conn,$inserir_identificacao);
						//ID da identificação inserida
						$ultimo_id = mysqli_insert_id($conn);
						$_SESSION['ultimo_id'] = $ultimo_id; ?>							
						<div class="alert alert-success" role="alert">identificação inserido com sucesso</div>
						<?php $_SESSION['control_aba'] = 1;
					}	
				}
				
			?>
			
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
					 <form class="form-horizontal"  action="" method="POST">
					 
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Designação</label>
                                <div class="col-sm-10">
                                    <select type="text" name='designacao' class="form-control" id="designacao" value="<?php if(isset($_SESSION['designacao'])){ echo $_SESSION['designacao']; }?>">
									<option value = "Herança Testamentária">Herança Testamentária</option>
                                    <option value = "Herança legítima (ou vaga)">Herança legítima (ou vaga)</option>
                                    <option value = "Legado">Legado</option>
                                    <option value = "Nacionalização">Nacionalização</option>
									<option value = "Permuta">Permuta</option>
									<option value = "Requisição">Requisição</option>
									<option value = "Reversão (Direito de)">Reversão (Direito de)</option>
									<option value = "Reversão (por fim de contrato de concessão)">Reversão (por fim de contrato de concessão)</option>
									<option value = "Sem Dono Conhecido">Sem Dono Conhecido</option>
									<option value = "Transferência">Transferência</option>
									<option value = "Outros">Outros</option>
									</select>
                                </div>
                            </div>
							
							
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tipo de Aquisição</label>
                                <div class="col-sm-10">
                                    <select  name='tipo_aquisicao' class="form-control" id="tipo_aquisicao"  value="<?php if(isset($_SESSION['tipo_aquisicao'])){ echo $_SESSION['tipo_aquisicao']; }?>">
                                    <option value = "Acessão">Acessão</option>
                                    <option value = "Arrendamento">Arrendamento</option>
                                    <option value = "Comodato">Comodato</option>
                                    <option value = "Compra(Novo)">Compra(Novo)</option>
									<option value = "Compra(usado)">Compra(usado)</option>
									<option value = "Confisco">Confisco</option>
									<option value = "Construção Própria">Construção Própria</option>
									<option value = "Doação">Doação</option>
									<option value = "Requisição">Requisição</option>
									<option value = "Herança testamentária">Herança testamentária</option>
									<option value = "Herança Legítima">Herança Legítima</option>
									<option value = "Legado">Legado</option>
									<option value = "Permuta">Permuta</option>
									<option value = "Outros">Outros</option>
								    </select>
								</div>
                            </div>
							
							<div class="form-group">
                                <label class="col-sm-2 control-label">Entidade Fornecedora</label>
                                <div class="col-sm-10">
                                    <input type="text" name='entidade_fornecedora' class="form-control" id="entidade_fornecedora" value="<?php if(isset($_SESSION['entidade_fornecedora'])){ echo $_SESSION['entidade_fornecedora']; }?>">
                                </div>
                            </div>
							
							<div class="form-group">
                                <label class="col-sm-2 control-label">Notas Adicionais</label>
                                <div class="col-sm-10">
                                    <input type="text" name='notasadicionais' class="form-control" id="notasadicionais" value="<?php if(isset($_SESSION['notasadicionais'])){ echo $_SESSION['notasadicionais']; }?>">
                                </div>
                            </div>
							
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success">Cadastrar</button>
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