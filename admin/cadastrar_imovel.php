 <?php
 
 include("../conexao.php");
 include("cabecalho.php");
 //session_start();
 /*controlar abas*/
 
 if(!isset($_SESSION['control_aba'])){
		$_SESSION['control_aba'] = 0;
	}
 ?>
 
 

		
		<div class="container theme-showcase" role="main">
			<div class="page-header">
				<h1>Bem Imóvel</h1>
			</div>	
             <div class="row espaco">
				<div class="pull-right">
					<a href="destroir_sessao_imovel.php"><button type='button' class='btn btn-sm btn-success'>Novo Bem +</button></a>
				</div>
			</div>			
			
			<?php
				if($_SERVER['REQUEST_METHOD']=='POST'){
					$request = md5(implode($_POST)); 
					if(isset($_SESSION['ultima_request']) && $_SESSION['ultima_request'] == $request){?>
						<div class="alert alert-danger" role="alert">Processou</div>
					<?php }elseif(!isset($_SESSION['ultimo_id'])){	//Identificação
						$_SESSION['ultima_request'] = $request;
						$codigo = $_POST['codigo'];
						$designacao = $_POST['designacao'];
						$tipo_imovel = $_POST['tipo_imovel'];
						$tipo_aquisicao = $_POST['tipo_aquisicao'];
						$entidade_fornecedora = $_POST['entidade_fornecedora'];
						$data_operacao = $_POST['data_operacao'];
						$_SESSION['codigo'] = $codigo;
						$_SESSION['designacao'] = $designacao;
						$_SESSION['tipo_imovel'] = $tipo_imovel;
						$_SESSION['tipo_aquisicao'] = $tipo_aquisicao;
						$_SESSION['entidade_fornecedora'] = $entidade_fornecedora;
						$_SESSION['data_operacao'] = $data_operacao;
											
						$inserir_identificacao = "INSERT INTO bemimovel (codigo, designacao, tipo_imovel, tipo_aquisicao, entidade_fornecedora, data_operacao) VALUES ('$codigo','$designacao', '$tipo_imovel', '$tipo_aquisicao', '$entidade_fornecedora', '$data_operacao')";
						$resultado_da_insercao = mysqli_query($conn,$inserir_identificacao);
						//ID da identificação inserida
						$ultimo_id = mysqli_insert_id($conn);
						$_SESSION['ultimo_id'] = $ultimo_id; ?>							
						<div class="alert" role="alert">identificação inserido com sucesso</div>
						<?php $_SESSION['control_aba'] = 1;
					}
					
					
					//Endereço
				if(isset($_POST['pais'])){
						$id_endereco_editar = $_SESSION['ultimo_id'];
						$pais = $_POST['pais'];
						$provincia = $_POST['provincia'];
						$cidade = $_POST['cidade'];
						$municipio = $_POST['municipio'];
						$bairro = $_POST['bairro'];
						$rua = $_POST['rua'];
						$inserir_endereco = "INSERT INTO endereco (pais, provincia, cidade, municipio, bairro, rua, id_imovel ) VALUES ('$pais', '$provincia', '$cidade', '$municipio', '$bairro', '$rua', '$id_endereco_editar')";
						$resultado_endereco = mysqli_query($conn, $inserir_endereco);?>							
						<div class="alert" role="alert">Endereço inserido com sucesso</div>
						<?php $_SESSION['control_aba'] = 2;
					}
						
					//Caracterização
					if(isset($_POST['dominio'])){
						$id_editar = $_SESSION['ultimo_id'];
						$dominio = $_POST['dominio'];
						$proprietario = $_POST['proprietario'];
						$periodo_afetacao = $_POST['periodo_afetacao'];
						$caracterizacao = "UPDATE bemimovel SET dominio = '$dominio', proprietario = '$proprietario', periodo_afetacao = '$periodo_afetacao' WHERE id = $id_editar";
						$resultado_caracterizacao = mysqli_query($conn, $caracterizacao);?>	
						<div class="alert" role="alert">Dados da Caracterização inserido com sucesso</div>
						<?php $_SESSION['control_aba'] = 3;
					}
					
					//Valorização
					if(isset($_POST['custo_aquisicao'])){
						$id_editar = $_SESSION['ultimo_id'];
						$custo_aquisicao = $_POST['custo_aquisicao'];
						$despesa_compra = $_POST['despesa_compra'];
						$classificacao_despesa = $_POST['classificacao_despesa'];
						$valor_mensal = $_POST['valor_mensal'];
						$vida_util = $_POST['vida_util'];
						$valorizacao = "UPDATE bemimovel SET custo_aquisicao = '$custo_aquisicao', despesa_compra = '$despesa_compra', classificacao_despesa = '$classificacao_despesa', valor_mensal = '$valor_mensal', vida_util = '$vida_util' WHERE id = $id_editar";
						$resultado_valorizacao = mysqli_query($conn, $valorizacao); ?>
						<div class="alert" role="alert">Dados da Valorização insiridos com Sucesso..!</div>
						<?php $_SESSION['control_aba'] = 4;
					}
					
					//Registo Predial
					if(isset($_POST['conservatoria'])){
						$id_editar = $_SESSION['ultimo_id'];
						$conservatoria = $_POST['conservatoria'];
						$tipo_construcao = $_POST['tipo_construcao'];
						$piso_num = $_POST['piso_num'];
						$area = $_POST['area'];
						$construcao_ano = $_POST['construcao_ano'];
						$reg_predial = "UPDATE bemimovel SET conservatoria = '$conservatoria', tipo_construcao = '$tipo_construcao', piso_num = '$piso_num', area = '$area', construcao_ano = '$construcao_ano' WHERE id = $id_editar";
						$resultado_reg_predial = mysqli_query($conn, $reg_predial); ?>
						<div class="alert" role="alert">Dados do Registo Predial insiridos com Sucesso..!</div>
						<?php $_SESSION['control_aba'] = 5;
					}
					
						//Control Patrimonial
					if(isset($_POST['estado_conservacao'])){
						$id_editar = $_SESSION['ultimo_id'];
						$data_ultimo_control = $_POST['data_ultimo_control'];
						$estado_conservacao = $_POST['estado_conservacao'];
						$valor_patrimonio = $_POST['valor_patrimonio'];
						$control_patrimonial = "UPDATE bemimovel SET data_ultimo_control = '$data_ultimo_control', estado_conservacao = '$estado_conservacao', valor_patrimonio = '$valor_patrimonio' WHERE id = $id_editar";
						$resultado_control_patrimonial = mysqli_query($conn, $control_patrimonial);?>
                        <div class="alert" role="alert">Dados do control patrimonial inserido com sucesso..!</div>						
						<?php $_SESSION['control_aba'] = 6;
					}
					
					
					//Outros Elementos
					if(isset($_POST['contrato'])){
						$id_editar = $_SESSION['ultimo_id'];
						$contrato = $_POST['contrato'];
						$data_inicio = $_POST['data_inicio'];
						$data_fim = $_POST['data_fim'];
						$outros_elementos = "UPDATE bemimovel SET contrato = '$contrato', data_inicio = '$data_inicio', data_fim = '$data_fim' WHERE id = $id_editar";
						$resultado_outros_elementos = mysqli_query($conn, $outros_elementos);?>
						<div class="alert" role="alert">Dados gravados com sucesso..!</div>
						<?php $_SESSION['control_aba'] = 7;
					}

                    //Seguro
				   if(isset($_POST['apolice_num'])){
						$id_seguro_editar = $_SESSION['ultimo_id'];
						$apolice_num = $_POST['apolice_num'];
						$data = $_POST['data'];
						$riscos_cobertos = $_POST['riscos_cobertos'];
						$valor = $_POST['valor'];
						$seguradora = $_POST['seguradora'];
						
						$inserir_seguro = "INSERT INTO seguro_imovel(apolice_num, data, riscos_cobertos, valor, seguradora,id_imovel) VALUES ('$apolice_num', '$data', '$riscos_cobertos', '$valor', '$seguradora', '$id_seguro_editar')";
						$resultado_da_insercao = mysqli_query($conn,$inserir_seguro);?>							
						<div class="alert " role="alert">Seguro inserido com sucesso</div>
						<?php $_SESSION['control_aba'] = 8;
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
				
				
				 <li role="presentation" <?php if($_SESSION['control_aba'] == 1){ echo "class='active'"; } ?> >
					<?php if(isset($_SESSION['ultimo_id'])){
						?><a href="#endereco" aria-controls="endereco" role="tab" data-toggle="tab"><?php
					}else{
						?><a href="#" aria-controls="endereco" role="tab" data-toggle="tab"><?php
					}?>					
						Endereço
					</a>
				</li>
				
				
				<li role="presentation" <?php if($_SESSION['control_aba'] == 2){ echo "class='active'"; } ?> >
					<?php if(isset($_SESSION['ultimo_id'])){
						?><a href="#caracterizacao" aria-controls="caracterizacao" role="tab" data-toggle="tab"><?php
					}else{
						?><a href="#" aria-controls="caracterizacao" role="tab" data-toggle="tab"><?php
					}?>					
						Caracterização
					</a>
				</li>
				
				 <li role="presentation" <?php if($_SESSION['control_aba'] == 3){ echo "class='active'"; } ?> >
					<?php if(isset($_SESSION['ultimo_id'])){
						?><a href="#valorizacao" aria-controls="valorizacao" role="tab" data-toggle="tab"><?php
					}else{
						?><a href="#" aria-controls="valorizacao" role="tab" data-toggle="tab"><?php
					}?>					
						Valorização
					</a>
				</li>
				
				<li role="presentation" <?php if($_SESSION['control_aba'] == 4){ echo "class='active'"; } ?> >
					<?php if(isset($_SESSION['ultimo_id'])){
						?><a href="#registo_predial" aria-controls="registo_predial" role="tab" data-toggle="tab"><?php
					}else{
						?><a href="#" aria-controls="registo_predial" role="tab" data-toggle="tab"><?php
					}?>					
						Registo Predial
					</a>
				</li>
				
				<li role="presentation" <?php if($_SESSION['control_aba'] == 5){ echo "class='active'"; } ?> >
					<?php if(isset($_SESSION['ultimo_id'])){
						?><a href="#control_patrimonial" aria-controls="control_patrimonial" role="tab" data-toggle="tab"><?php
					}else{
						?><a href="#" aria-controls="control_patrimonial" role="tab" data-toggle="tab"><?php
					}?>					
						Control Patrimonial
					</a>
				</li>
				
				<li role="presentation" <?php if($_SESSION['control_aba'] == 6){ echo "class='active'"; } ?> >
					<?php if(isset($_SESSION['ultimo_id'])){
						?><a href="#outros_elementos" aria-controls="outros_elementos" role="tab" data-toggle="tab"><?php
					}else{
						?><a href="#" aria-controls="outros_elementos" role="tab" data-toggle="tab"><?php
					}?>					
						Outros Elementos
					</a>
				</li>
				
				
				
				<li role="presentation" <?php if($_SESSION['control_aba'] == 7){ echo "class='active'"; } ?> ><a href="#seguro" aria-controls="seguro" role="tab" data-toggle="tab">Seguro</a></li>
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
                                <label class="col-sm-2 control-label">Código</label>
                                <div class="col-sm-10">
                                    <input type="text" name='codigo' class="form-control" id="codigo" value="<?php if(isset($_SESSION['codigo'])){ echo $_SESSION['codigo']; }?>">
                                </div>
                            </div>
					 
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
                                <label class="col-sm-2 control-label">Tipo de Imóvel</label>
                                <div class="col-sm-10">
                                    <select type="text" name='tipo_imovel' class="form-control" id="tipo_imovel" value="<?php if(isset($_SESSION['tipo_imovel'])){ echo $_SESSION['tipo_imovel']; }?>">
									<option value = "Misto">Misto</option>
                                    <option value = "Rústico">Rústico</option>
                                    <option value = "Urbano">Urbano</option>
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
                                <label class="col-sm-2 control-label">Data de Entrada Em Operação</label>
                                <div class="col-sm-10">
                                    <input type="date" name='data_operacao' class="form-control" id="data_operacao"  value="<?php if(isset($_SESSION['data_operacao'])){ echo $_SESSION['data_operacao']; }?>">
                                </div>
                            </div>
							
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success">Proxímo</button>
                                </div>
                            </div>
                        </form>
					</div>
				</div> <!-- Fim Identificação -->
				         
				<!-- Endereço -->			 
					<div role="tabpanel"  
					<?php if($_SESSION['control_aba'] == 1){ 
						echo "class='tab-pane active'"; 
						}else{ 
							echo "class='tab-pane'"; 
						} ?> id="messages">
					<div style="padding-top:20px;">
					 <form class="form-horizontal"  action="" method="POST">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">País</label>
                                <div class="col-sm-10">
                                    <input type="text" name='pais' class="form-control" id="pais">
                                </div>
                            </div>
							
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Província</label>
                                <div class="col-sm-10">
                                    <input type="text" name='provincia' class="form-control" id="provincia">
                                </div>
                            </div>
							
							 <div class="form-group">
                                <label class="col-sm-2 control-label">Cidade</label>
                                <div class="col-sm-10">
                                    <input type="text" name='cidade' class="form-control" id="cidade">
                                </div>
                            </div>
							
							<div class="form-group">
                                <label class="col-sm-2 control-label">Municipio</label>
                                <div class="col-sm-10">
                                    <input type="text" name='municipio' class="form-control" id="municipio">
                                </div>
                            </div>
							
							<div class="form-group">
                                <label class="col-sm-2 control-label">Bairro</label>
                                <div class="col-sm-10">
                                    <input type="text" name='bairro' class="form-control" id="bairro">
                                </div>
                            </div>
							
							<div class="form-group">
                                <label class="col-sm-2 control-label">Rua</label>
                                <div class="col-sm-10">
                                    <input type="text" name='rua' class="form-control" id="rua">
                                </div>
                            </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success">Proxímo</button>
                                </div>
                            </div>
                        </form>
					</div><!-- Fim padding -->
				</div><!-- Fim Tab -->
			<!-- Fim Endereço -->				 
				                        
				                                   <!-- Caracterização -->
											
				 <div role="tabpanel"  
					<?php if($_SESSION['control_aba'] == 2){ 
						echo "class='tab-pane active'"; 
						}else{ 
							echo "class='tab-pane'"; 
						} ?> id="messages">
					<div style="padding-top:20px;">
					 <form class="form-horizontal"  action="" method="POST">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Domínio</label>
                                <div class="col-sm-10">
                                    <input type="text" name='dominio' class="form-control" id="dominio">
                                </div>
                            </div>
							
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Proprietário</label>
                                <div class="col-sm-10">
                                    <input type="text" name='proprietario' class="form-control" id="proprietario">
                                </div>
                            </div>
							
							<div class="form-group">
                                <label class="col-sm-2 control-label">Período de Afetação</label>
                                <div class="col-sm-10">
                                    <input type="text" name='periodo_afetacao' class="form-control" id="periodo_afetacao">
                                </div>
                            </div>
							
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success">Proxímo</button>
                                </div>
                            </div>
                        </form>
					</div>
				</div>    <!-- Fim Caracterização -->
				                
                                            
			<!-- Valorização -->						
				 <div role="tabpanel"  
					<?php if($_SESSION['control_aba'] == 3){ 
						echo "class='tab-pane active'"; 
						}else{ 
							echo "class='tab-pane'"; 
						} ?> id="messages">
					<div style="padding-top:20px;">
					 <form class="form-horizontal"  action="" method="POST">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Custo de Aquisição</label>
                                <div class="col-sm-10">
                                    <input type="text" name='custo_aquisicao' class="form-control" id="custo_aquisicao">
                                </div>
                            </div>
							
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Despesas Incluída</label>
                                <div class="col-sm-10">
                                    <input type="text" name='despesa_compra' class="form-control" id="despesa_compra">
                                </div>
                            </div>
							
							 <div class="form-group">
                                <label class="col-sm-2 control-label">Classificação da Despesa</label>
                                <div class="col-sm-10">
                                    <select  class="form-control" name='classificacao_despesa' id="classificacao_despesa">
									<option value = "Orçamental">Orçamental</option>
                                    <option value = "Patrimonial">Patrimonial</option>
                                    <option value = "Financiamento">Financiamento</option>
									</select>
                                </div>
                            </div>
										
							<div class="form-group">
                                <label class="col-sm-2 control-label">Valor Mensal</label>
                                <div class="col-sm-10">
                                    <input type="text" name='valor_mensal' class="form-control" id="valor_mensal">
                                </div>
                            </div>
							
							<div class="form-group">
                                <label class="col-sm-2 control-label">Vida Útil Estimada</label>
                                <div class="col-sm-10">
                                    <input type="text" name='vida_util' class="form-control" id="vida_util">
                                </div>
                            </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success">Proxímo</button>
                                </div>
                            </div>
                        </form>
					</div>
				</div>  <!-- Fim Valorização -->
				
				
				                              <!-- Registro Predial -->
											  
				 <div role="tabpanel"  
					<?php if($_SESSION['control_aba'] == 4){ 
						echo "class='tab-pane active'"; 
						}else{ 
							echo "class='tab-pane'"; 
						} ?> id="messages">
					<div style="padding-top:20px;">
					 <form class="form-horizontal"  action="" method="POST">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Código da Conservatória</label>
                                <div class="col-sm-10">
                                    <input type="text" name='conservatoria' class="form-control" id="conservatoria">
                                </div>
                            </div>
							
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tipo de Construção</label>
                                <div class="col-sm-10">
                                    <input type="text" name='tipo_construcao' class="form-control" id="tipo_construcao">
                                </div>
                            </div>
							
							<div class="form-group">
                                <label class="col-sm-2 control-label">Nº de Piso</label>
                                <div class="col-sm-10">
                                    <input type="text" name='piso_num' class="form-control" id="piso_num">
                                </div>
                            </div>
							
							<div class="form-group">
                                <label class="col-sm-2 control-label">Área</label>
                                <div class="col-sm-10">
                                    <input type="text" name='area' class="form-control" id="area">
                                </div>
                            </div>
							
							<div class="form-group">
                                <label class="col-sm-2 control-label">Ano da Construção</label>
                                <div class="col-sm-10">
                                    <input type="text" name='construcao_ano' class="form-control" id="construcao_ano">
                                </div>
                            </div>
							
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success">Proxímo</button>
                                </div>
                            </div>
                        </form>
					</div> <!-- Fim Padding -->
				</div> <!-- Fim TabPanel -->
											
				                           <!-- Fim Registro Predial -->
				
				
				
				                          <!-- Control Patrimonial -->
											
				 <div role="tabpanel"  
					<?php if($_SESSION['control_aba'] == 5){ 
						echo "class='tab-pane active'"; 
						}else{ 
							echo "class='tab-pane'"; 
						} ?> id="messages">
					<div style="padding-top:20px;">
					 <form class="form-horizontal"  action="" method="POST">
                            
							<div class="form-group">
                                <label class="col-sm-2 control-label">Data do Último Control </label>
                                <div class="col-sm-10">
                                    <input type="date" name='data_ultimo_control' class="form-control" id="data_ultimo_control">
                                </div>
                            </div>
							
							 <div class="form-group">
                                <label class="col-sm-2 control-label">Estado de Conservação</label>
                                <div class="col-sm-10">
                                    <select  class="form-control" name='estado_conservacao' id="estado_conservacao">
									<option value = "Bom">Bom</option>
                                    <option value = "Razoável">Razoável</option>
                                    <option value = "Depreciado">Depreciado</option>
									</select>
                                </div>
                            </div>
							
							<div class="form-group">
                                <label class="col-sm-2 control-label">Valor do Património </label>
                                <div class="col-sm-10">
                                    <input type="text" name='valor_patrimonio' class="form-control" id="valor_patrimonio">
                                </div>
                            </div>
							
						
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success">Proxímo</button>
                                </div>
                            </div>
                        </form>
					</div>
				</div> <!-- Fim Control Patrimonial -->
				
				       <!-- Outros elementos -->
											
				 <div role="tabpanel"  
					<?php if($_SESSION['control_aba'] == 6){ 
						echo "class='tab-pane active'"; 
						}else{ 
							echo "class='tab-pane'"; 
						} ?> id="messages">
					<div style="padding-top:20px;">
					 <form class="form-horizontal"  action="" method="POST">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Contrato de Assistência </label>
                                <div class="col-sm-10">
                                    <input type="tex" name='contrato' class="form-control" id="contrato">
                                </div>
                            </div>
							
							<div class="form-group">
                                <label class="col-sm-2 control-label">Data Ínicio </label>
                                <div class="col-sm-10">
                                    <input type="date" name='data_inicio' class="form-control" id="data_inicio">
                                </div>
                            </div>
							
							<div class="form-group">
                                <label class="col-sm-2 control-label">Data Fim </label>
                                <div class="col-sm-10">
                                    <input type="date" name='data_fim' class="form-control" id="data_fim">
                                </div>
                            </div>
							
						
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success">Proximo</button>
                                </div>
                            </div>
                        </form>
					</div>
				</div> <!-- Fim Outros Elementos -->
				
				<!-- seguro -->			 
					<div role="tabpanel"  
					<?php if($_SESSION['control_aba'] == 7){ 
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
			  </div> <!-- Fim Tab content -->
			</div> <!--Fim da class div-->
		</div> <!--Fim da class conteiner-->
		
		
		
		<script src="js/jquery-1.11.3.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>