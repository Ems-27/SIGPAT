 <?php
 
 include("cabecalho.php");
 include("../conexao.php");
 //session_start();
 /*controlar abas*/
 
 if(!isset($_SESSION['control_aba'])){
		$_SESSION['control_aba'] = 0;
	}
 ?>
 
 
 <!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Cadastramento de bem móvel</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/estilo.css" rel="stylesheet">
	</head>
	<body>
		
		<div class="container theme-showcase" role="main">
			<div class="page-header">
				<h1>Bem Móvel</h1>
			</div>	

             <div class="row espaco">
				<div class="pull-right">
					<a href="destroir_sessao_movel.php"><button type='button' class='btn btn-sm btn-success'>Novo Bem</button></a>
				</div>
			</div>			
			 <!--Identificação-->
			<?php
				if($_SERVER['REQUEST_METHOD']=='POST'){ 
					$request = md5(implode($_POST));
					if(isset($_SESSION['ultima_request']) && $_SESSION['ultima_request'] == $request){?>
						<div class="alert alert-danger" role="alert">Processou</div>
					<?php }elseif(!isset($_SESSION['ultimo_id'])){	
						$_SESSION['ultima_request'] = $request;
						$codigo = $_POST['codigo'];
						$designacao = $_POST['designacao'];
						$tipo_aquisicao = $_POST['tipo_aquisicao'];
						$entidade_fornecedora = $_POST['entidade_fornecedora'];
						$data_operacao = $_POST['data_operacao'];
						$localizacao = $_POST['localizacao'];
						$_SESSION['codigo'] = $codigo;
						$_SESSION['designacao'] = $designacao;
						$_SESSION['tipo_aquisicao'] = $tipo_aquisicao;
						$_SESSION['entidade_fornecedora'] = $entidade_fornecedora;
						$_SESSION['data_operacao'] = $data_operacao;
                        $_SESSION['localizacao'] = $localizacao;
											
						$inserir_identificacao = "INSERT INTO bemmovel (designacao, tipo_aquisicao, entidade_fornecedora, data_operacao, localizacao) VALUES ('$designacao', '$tipo_aquisicao', '$entidade_fornecedora', '$data_operacao', '$localizacao')";
						$resultado_da_insercao = mysqli_query($conn,$inserir_identificacao);
						//ID da identificação inserida
						$ultimo_id = mysqli_insert_id($conn);
						$_SESSION['ultimo_id'] = $ultimo_id; ?>							
						<div class="alert alert-success" role="alert">Caracterização inserida com sucesso</div>
						<?php $_SESSION['control_aba'] = 1;
					}
				
					//Caracterização
					if(isset($_POST['marca'])){
						$id_editar = $_SESSION['ultimo_id'];
						$marca = $_POST['marca'];
						$modelo = $_POST['modelo'];
						$cor = $_POST['cor'];
						$serie_num = $_POST['serie_num'];
						$caracterizacao = "UPDATE bemmovel SET marca = '$marca', modelo = '$modelo', cor = '$cor', serie_num = '$serie_num' WHERE id = $id_editar";
						$resultado_caracterizacao = mysqli_query($conn, $caracterizacao);
						echo "Dados da valorização inserido com sucesso";?>
						<?php $_SESSION['control_aba'] = 2;
					}
					//valorização
					if(isset($_POST['custo_aquisicao'])){
						$id_editar = $_SESSION['ultimo_id'];
						$custo_aquisicao = $_POST['custo_aquisicao'];
						$despesa_compra = $_POST['despesa_compra'];
						$classificacao_despesa = $_POST['classificacao_despesa'];
						$valor_mensal = $_POST['valor_mensal'];
						$vida_util = $_POST['vida_util'];
						$valorizacao = "UPDATE bemmovel SET custo_aquisicao = '$custo_aquisicao', despesa_compra = '$despesa_compra', classificacao_despesa = '$classificacao_despesa', valor_mensal = '$valor_mensal', vida_util = '$vida_util' WHERE id = $id_editar";
						$resultado_valorizacao = mysqli_query($conn, $valorizacao);?>
						<div class="alert alert-success" role="alert">Dados da Valorização inseridos com sucesso</div>
						<?php $_SESSION['control_aba'] = 3;
						
					}
					//Control Patrimonial
					if(isset($_POST['data_control'])){
						$id_editar = $_SESSION['ultimo_id'];
						$data_control = $_POST['data_control'];
						$estado_conservacao = $_POST['estado_conservacao'];
						$operacionalidade = $_POST['operacionalidade'];
						$control_patrimonial = "UPDATE bemmovel SET data_control = '$data_control', estado_conservacao = '$estado_conservacao', operacionalidade = '$operacionalidade' WHERE id = $id_editar";
						$resultado_valorizacao = mysqli_query($conn, $control_patrimonial);?>
						<div class="alert alert-success" role="alert">Dados do Control Patrimonial inseridos com sucesso</div>
						<?php $_SESSION['control_aba'] = 4;
					}
					
					 //Seguro
				   if(isset($_POST['apolice_num'])){
						$id_seguro_editar = $_SESSION['ultimo_id'];
						$apolice_num = $_POST['apolice_num'];
						$data = $_POST['data'];
						$riscos_cobertos = $_POST['riscos_cobertos'];
						$valor = $_POST['valor'];
						$seguradora = $_POST['seguradora'];
						
						$inserir_seguro = "INSERT INTO seguro_movel(apolice_num, data, riscos_cobertos, valor, seguradora, id_movel) VALUES ('$apolice_num', '$data', '$riscos_cobertos', '$valor', '$seguradora', '$id_seguro_editar')";
						$resultado_da_insercao = mysqli_query($conn,$inserir_seguro);?>							
						<div class="alert " role="alert">Seguro inserido com sucesso</div>
						<?php $_SESSION['control_aba'] = 8;
					}
					
				}
			?>
			
			<div> <!-- Div -->

			  <!-- Nav tabs -->
			  <ul class="nav nav-tabs" role="tablist">
				<li role="presentation"<?php if($_SESSION['control_aba'] == 0){ echo "class='active'"; } ?>>
				    <a href="#identificacao" aria-controls="identificacao" role="tab" data-toggle="tab">
				      Identificação
				    </a>
				</li>
				<li role="presentation" <?php if($_SESSION['control_aba'] == 1){ echo "class='active'"; } ?> >
					<?php if(isset($_SESSION['ultimo_id'])){
						?><a href="#caracterizacao" aria-controls="caracterizacao" role="tab" data-toggle="tab"><?php
					}else{
						?><a href="#" aria-controls="caracterizacao" role="tab" data-toggle="tab"><?php
					}?>					
						Caracterização
					</a>
				</li>
				 <li role="presentation" <?php if($_SESSION['control_aba'] == 2){ echo "class='active'"; } ?> >
					<?php if(isset($_SESSION['ultimo_id'])){
						?><a href="#valorizacao" aria-controls="valorizacao" role="tab" data-toggle="tab"><?php
					}else{
						?><a href="#" aria-controls="valorizacao" role="tab" data-toggle="tab"><?php
					}?>					
						Valorização
					</a>
				</li>
				
				<li role="presentation" <?php if($_SESSION['control_aba'] == 3){ echo "class='active'"; } ?> >
					<?php if(isset($_SESSION['ultimo_id'])){
						?><a href="#control_patrimonial" aria-controls="control_patrimonial" role="tab" data-toggle="tab"><?php
					}else{
						?><a href="#" aria-controls="control_patrimonial" role="tab" data-toggle="tab"><?php
					}?>					
						Control Patrimonial
					</a>
				</li>
				<li role="presentation" <?php if($_SESSION['control_aba'] == 4){ echo "class='active'"; } ?> ><a href="#seguro" aria-controls="seguro" role="tab" data-toggle="tab">Seguro</a></li>
				
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
                                <label class="col-sm-2 control-label">Codigo</label>
                                <div class="col-sm-10">
                                    <input type="text" name='codigo' class="form-control" id="codigo">
                                </div>
                            </div>
					 
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Designação</label>
                                <div class="col-sm-10">
                                    <select type="text" name='designacao' class="form-control" id="designacao">
									<option value = "Requisição">Requisição</option>
                                    <option value = "Reversão(Direito de)">Reversão(Direito de)</option>
                                    <option value = "Reversão (Por Fim de Contrato de Concessão)">Reversão (Por Fim de Contrato de Concessão)</option>
                                    <option value = "Transferência">Transferência</option>
									<option value = "Sem Dono conhecido">Sem Dono conhecido</option>
									<option value = "Outros">Outros</option>
									</select>
                                </div>
                            </div>
							
							
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tipo de Aquisição</label>
                                <div class="col-sm-10">
                                    <select  name='tipo_aquisicao' class="form-control" id="tipo_aquisicao">
                                    <option value = "Aluguer">Aluguer</option>
                                    <option value = "Compra(Novo)">Compra(Novo)</option>
                                    <option value = "Compra(Usado)">Compra(Usado)</option>
                                    <option value = "Confisco">Confisco</option>
									<option value = "Doação">Doação</option>
									<option value = "Herança Testamentária">Herança Testamentária</option>
									<option value = "Herança Legítima">Herança Legítima</option>
									<option value = "Requisição">Requisição</option>
									<option value = "Sem Dono conhecido">Sem Dono conhecido</option>
									<option value = "Outros">Outros</option>
								    </select>
								</div>
                            </div>
							
							<div class="form-group">
                                <label class="col-sm-2 control-label">Entidade Fornecedora</label>
                                <div class="col-sm-10">
                                    <input type="text" name='entidade_fornecedora' class="form-control" id="entidade_fornecedora">
                                </div>
                            </div>
							
							<div class="form-group">
                                <label class="col-sm-2 control-label">Data de Entrada Em Operação</label>
                                <div class="col-sm-10">
                                    <input type="date" name='data_operacao' class="form-control" id="data_operacao">
                                </div>
                            </div>
							
							
							<div class="form-group">
                                <label class="col-sm-2 control-label">Localização</label>
                                <div class="col-sm-10">
                                    <input type="text" name='localizacao' class="form-control" id="localizacao">
                                </div>
                            </div>
							
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success">Proxímo</button>
                                </div>
                            </div>
                        </form>
					</div>
				</div> <!-- Fim da Identificação -->
				
				
				                                   <!-- Caracterização -->
											
				 <div role="tabpanel"  
					<?php if($_SESSION['control_aba'] == 1){ 
						echo "class='tab-pane active'"; 
						}else{ 
							echo "class='tab-pane'"; 
						} ?> id="messages">
					<div style="padding-top:20px;">
					 <form class="form-horizontal"  action="" method="POST">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Marca</label>
                                <div class="col-sm-10">
                                    <input type="text" name='marca' class="form-control" id="marca">
                                </div>
                            </div>
							
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Modelo</label>
                                <div class="col-sm-10">
                                    <input type="text" name='modelo' class="form-control" id="modelo">
                                </div>
                            </div>
							
							<div class="form-group">
                                <label class="col-sm-2 control-label">cor</label>
                                <div class="col-sm-10">
                                    <input type="text" name='cor' class="form-control" id="cor">
                                </div>
                            </div>
							
							
							<div class="form-group">
                                <label class="col-sm-2 control-label">Número de Série</label>
                                <div class="col-sm-10">
                                    <input type="text" name='serie_num' class="form-control" id="serie_num">
                                </div>
                            </div>
							
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success">Proxímo</button>
                                </div>
                            </div>
                        </form>
					</div>
				</div>  <!-- Fim da Caracterização -->
				
				
				                            
                                            <!-- Valorização -->
											
				 <div role="tabpanel"  
					<?php if($_SESSION['control_aba'] == 2){ 
						echo "class='tab-pane active'"; 
						}else{ 
							echo "class='tab-pane'"; 
						} ?> id="messages">
					<div style="padding-top:20px;">
					 <form class="form-horizontal"  action="" method="POST">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Custo de Aquisição</label>
                                <div class="col-sm-10">
                                    <input type="text" name='custo_aquisicao' class="form-control" id="custo_aquisicao" >
                                </div>
                            </div>
							
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Despesas de Compra Incluída</label>
                                <div class="col-sm-10">
                                    <input type="text" name='despesa_compra' class="form-control" id="despesa_compra" >
                                </div>
                            </div>
							
							 <div class="form-group">
                                <label class="col-sm-2 control-label">Classificação da Despesa</label>
                                <div class="col-sm-10">
                                    <select  class="form-control" name='classificacao_despesa' id="classificacao_despesa" >
									<option value = "Orçamental">Orçamental</option>
                                    <option value = "Patrimonial">Patrimonial</option>
                                    <option value = "Financiamento">Financiamento</option>
									</select>
                                </div>
                            </div>
							
							<div class="form-group">
                                <label class="col-sm-2 control-label">Valor Mensal</label>
                                <div class="col-sm-10">
                                    <input type="text" name='valor_mensal' class="form-control" id="valor_mensal" >
                                </div>
                            </div>
							
							<div class="form-group">
                                <label class="col-sm-2 control-label">Vida Útil Estimada</label>
                                <div class="col-sm-10">
                                    <input type="text" name='vida_util' class="form-control" id="vida_util" >
                                </div>
                            </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success">Proxímo</button>
                                </div>
                            </div>
                        </form>
					</div>
				</div> <!-- Fim da Valorização -->
				
				
				                              <!-- Control Patrimonial -->
											
				 <div role="tabpanel"  
					<?php if($_SESSION['control_aba'] == 3){ 
						echo "class='tab-pane active'"; 
						}else{ 
							echo "class='tab-pane'"; 
						} ?> id="messages">
					<div style="padding-top:20px;">
					 <form class="form-horizontal"  action="" method="POST">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Data do Ultimo control</label>
                                <div class="col-sm-10">
                                    <input type="Date" name = "data_control" class="form-control" id="data_control" >
                                </div>
                            </div>
							
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Estado de Conservação</label>
                                <div class="col-sm-10">
                                    <select name = "estado_conservacao" class="form-control" id="estado_conservacao" >
                                     <option value = "Bom">Bom</option>
                                     <option value = "Razoável">Razoável</option>
                                     <option value = "Mau">Mau</option>
									</select>
								</div>
                            </div>
							
							<div class="form-group">
                                <label class="col-sm-2 control-label">Operacionalidade</label>
                                <div class="col-sm-10">
                                    <input type="text" name = "operacionalidade" class="form-control" id="operacionalidade" >
                                </div>
                            </div>
							
							
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success">Proximo</button>
                                </div>
                            </div>
                        </form>
					</div>
				</div><!-- Control Patrimonial -->
				
								<!-- seguro -->			 
					<div role="tabpanel"  
					<?php if($_SESSION['control_aba'] == 4){ 
						echo "class='tab-pane active'"; 
						}else{ 
							echo "class='tab-pane'"; 
						} ?> id="messages">
					<div style="padding-top:20px;">
					 <form class="form-horizontal"  action="" method="POST">
					 
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nº de Apólice</label>
                                <div class="col-sm-10">
                                    <input type="text" name='apolice_num' class="form-control" id="apolice_num">
                                </div>
                            </div>
							
							<div class="form-group">
                                <label class="col-sm-2 control-label">Data</label>
                                <div class="col-sm-10">
                                    <input type="date" name='data' class="form-control" id="data">
                                </div>
                            </div>
							
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Riscos cobertos</label>
                                <div class="col-sm-10">
                                    <select  name='riscos_cobertos' class="form-control" id="riscos_cobertos"> 
                                    <option value = "Danos causados a terceiros">Danos causados a terceiros</option>
                                    <option value = "Danos Próprios">Danos Próprios</option>
                                    <option value = "Roubo">Roubo</option>
								    </select>
								</div>
                            </div>
							
							<div class="form-group">
                                <label class="col-sm-2 control-label">Valor</label>
                                <div class="col-sm-10">
                                    <input type="text" name='valor' class="form-control" id="valor">
                                </div>
                            </div>
							
							
							<div class="form-group">
                                <label class="col-sm-2 control-label">Seguradora</label>
                                <div class="col-sm-10">
                                    <input type="text" name='seguradora' class="form-control" id="seguradora">
                                </div>
                            </div>
							
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success">Finalizar</button>
                                </div>
                            </div>
                        </form>
					</div><!--Fim padding-->
				</div> <!--Fim TabPainel-->
			    <!-- Fim seguro -->	
				
			  </div><!-- fim da class tab-content -->
			</div><!-- fim da div-->
		</div><!-- fim da classe conteiner-->
		
		
		
		<script src="js/jquery-1.11.3.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>