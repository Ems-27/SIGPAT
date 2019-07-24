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
				<h1>Cadastramento de Veiculo</h1>
			</div>	

             <div class="row espaco">
				<div class="pull-right">
					<a href="destroir_sessao_veiculo.php"><button type='button' class='btn btn-sm btn-success'>Novo Bem +</button></a>
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
											
						$inserir_identificacao = "INSERT INTO veiculo (codigo, designacao, tipo_aquisicao, entidade_fornecedora, data_operacao, localizacao) VALUES ('$codigo','$designacao', '$tipo_aquisicao', '$entidade_fornecedora', '$data_operacao', '$localizacao')";
						$resultado_da_insercao = mysqli_query($conn,$inserir_identificacao);
						//ID da identificação inserida
						$ultimo_id = mysqli_insert_id($conn);
						$_SESSION['ultimo_id'] = $ultimo_id; ?>							
						<div class="alert" role="alert">identificação inserido com sucesso</div>
						<?php $_SESSION['control_aba'] = 1;
					}	
					
					// Caracterização 1
					if(isset($_POST['matricula'])){
						$id_editar = $_SESSION['ultimo_id'];
						$matricula = $_POST['matricula'];
						$marca = $_POST['marca'];
						$modelo = $_POST['modelo'];
						$combustivel = $_POST['combustivel'];
						$cilindrada = $_POST['cilindrada'];
						$cilindro_num = $_POST['cilindro_num'];
						$motor_num = $_POST['motor_num'];
						$chassis_num = $_POST['chassis_num'];
						$caracterizacao1 = "UPDATE veiculo SET matricula = '$matricula', marca = '$marca', modelo = '$modelo', combustivel = '$combustivel', cilindrada = '$cilindrada', cilindro_num = '$cilindro_num', motor_num = '$motor_num', chassis_num = '$chassis_num'  WHERE id = $id_editar";
						$resultado_caracterizacao = mysqli_query($conn, $caracterizacao1);?>							
						<div class="alert" role="alert">Dados da Caracterização Inseridos com Sucesso!</div>
						<?php $_SESSION['control_aba'] = 2;
					}
					
					// Caracterização 2
					if(isset($_POST['quadro'])){
						$id_editar = $_SESSION['ultimo_id'];
						$quadro = $_POST['quadro'];
						$cor = $_POST['cor'];
						$porta_num = $_POST['porta_num'];
						$capacidade = $_POST['capacidade'];
						$lotacao = $_POST['lotacao'];
						$caixa = $_POST['caixa'];
						$entidade_proprietaria = $_POST['entidade_proprietaria'];
						$periodo_afetacao = $_POST['periodo_afetacao'];
						$caracterizacao2 = "UPDATE veiculo SET quadro = '$quadro', cor = '$cor', porta_num = '$porta_num', capacidade = '$capacidade', lotacao = '$lotacao', caixa = '$caixa', entidade_proprietaria = '$entidade_proprietaria', periodo_afetacao = '$periodo_afetacao'  WHERE id = $id_editar";
						$resultado_caracterizacao2 = mysqli_query($conn, $caracterizacao2);?>							
						<div class="alert" role="alert">Dados da Caracterização Inseridos com Sucesso!</div>
						<?php $_SESSION['control_aba'] = 3;
						
					}
					
					  
					// Registo de Propriedade
					if(isset($_POST['conservatoria'])){
						$id_editar = $_SESSION['ultimo_id'];
						$conservatoria = $_POST['conservatoria'];
						$livro = $_POST['livro'];
						$ano_fabrico = $_POST['ano_fabrico'];  
						$conservacao = $_POST['conservacao'];
						$operacionalidade = $_POST['operacionalidade'];
						$control = $_POST['control'];
						$caracterizacao2 = "UPDATE veiculo SET conservatoria = '$conservatoria', livro = '$livro', ano_fabrico = '$ano_fabrico', conservacao = '$conservacao', operacionalidade = '$operacionalidade', control = '$control' WHERE id = $id_editar";
						$resultado_caracterizacao2 = mysqli_query($conn, $caracterizacao2);?>							
						<div class="alert" role="alert">Dados da Registo Inseridos com Sucesso!</div>
						<?php $_SESSION['control_aba'] = 4;
					}
					
					// Valorização
					if(isset($_POST['custo_aquisicao'])){
						$id_editar = $_SESSION['ultimo_id'];
						$custo_aquisicao = $_POST['custo_aquisicao'];
						$despesa_compra = $_POST['despesa_compra'];
						$class_despesa = $_POST['class_despesa'];  
						$valor_mensal = $_POST['valor_mensal'];
						$vida_util = $_POST['vida_util'];
						$valorizacao = "UPDATE veiculo SET custo_aquisicao = '$custo_aquisicao', despesa_compra = '$despesa_compra', class_despesa = '$class_despesa', valor_mensal = '$valor_mensal', vida_util = '$vida_util' WHERE id = $id_editar";
						$resultado_valorizacao = mysqli_query($conn, $valorizacao);?>							
						<div class="alert" role="alert">Dados da Registo Inseridos com Sucesso!</div>
						<?php $_SESSION['control_aba'] = 5;
					}
					
					//Seguro
				   if(isset($_POST['apolice_num'])){
						$id_seguro_editar = $_SESSION['ultimo_id'];
						$apolice_num = $_POST['apolice_num'];
						$data = $_POST['data'];
						$riscos_cobertos = $_POST['riscos_cobertos'];
						$valor = $_POST['valor'];
						$seguradora = $_POST['seguradora'];
						
						$inserir_seguro = "INSERT INTO seguro_veiculo(apolice_num, data, riscos_cobertos, valor, seguradora,id_veiculo) VALUES ('$apolice_num', '$data', '$riscos_cobertos', '$valor', '$seguradora', '$id_seguro_editar')";
						$resultado_da_insercao = mysqli_query($conn,$inserir_seguro);?>							
						<div class="alert " role="alert">Seguro inserido com sucesso</div>
						<?php $_SESSION['control_aba'] = 6;
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
						?><a href="#caracterizacao" aria-controls="caracterizacao" role="tab" data-toggle="tab"><?php
					}else{
						?><a href="#" aria-controls="caracterizacao" role="tab" data-toggle="tab"><?php
					}?>					
						Caracterização
					</a>
				</li>
				
				<li role="presentation" <?php if($_SESSION['control_aba'] == 2){ echo "class='active'"; } ?> >
					<?php if(isset($_SESSION['ultimo_id'])){
						?><a href="#caracterizacao2" aria-controls="caracterizacao2" role="tab" data-toggle="tab"><?php
					}else{
						?><a href="#" aria-controls="caracterizacao2" role="tab" data-toggle="tab"><?php
					}?>					
						Caracterização 2
					</a>
				</li>
				
				<li role="presentation" <?php if($_SESSION['control_aba'] == 3){ echo "class='active'"; } ?> >
					<?php if(isset($_SESSION['ultimo_id'])){
						?><a href="#registo_propriedade" aria-controls="registo_propriedade" role="tab" data-toggle="tab"><?php
					}else{
						?><a href="#" aria-controls="registo_propriedade" role="tab" data-toggle="tab"><?php
					}?>					
						Registo de Propriedade
					</a>
				</li>
				
				<li role="presentation" <?php if($_SESSION['control_aba'] == 4){ echo "class='active'"; } ?> >
					<?php if(isset($_SESSION['ultimo_id'])){
						?><a href="#valorizacao" aria-controls="valorizacao" role="tab" data-toggle="tab"><?php
					}else{
						?><a href="#" aria-controls="valorizacao" role="tab" data-toggle="tab"><?php
					}?>					
						valorizacao
					</a>
				</li>
				
				<li role="presentation" <?php if($_SESSION['control_aba'] == 5){ echo "class='active'"; } ?> ><a href="#seguro" aria-controls="seguro" role="tab" data-toggle="tab">Seguro</a></li>
				
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
                                    <input type="text" name='codigo' class="form-control" id="codigo" value="<?php if(isset($_SESSION['entidade_fornecedora'])){ echo $_SESSION['entidade_fornecedora']; }?>">
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
                                <label class="col-sm-2 control-label">Data de entrada em Operação</label>
                                <div class="col-sm-10">
                                    <input type="date" name='data_operacao' class="form-control" id="data_operacao" value="<?php if(isset($_SESSION['data_operacao'])){ echo $_SESSION['data_operacao']; }?>">
                                </div>
                            </div>
							
							
							<div class="form-group">
                                <label class="col-sm-2 control-label">Localização</label>
                                <div class="col-sm-10">
                                    <input type="text" name='localizacao' class="form-control" id="localizacao" value="<?php if(isset($_SESSION['localizacao'])){ echo $_SESSION['localizacao']; }?>">
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
				                            
                                           <!-- Caracterização 1-->
											
				 <div role="tabpanel"  
					<?php if($_SESSION['control_aba'] == 1){ 
						echo "class='tab-pane active'"; 
						}else{ 
							echo "class='tab-pane'"; 
						} ?> id="messages">
					<div style="padding-top:20px;">
					 <form class="form-horizontal"  action="" method="POST">
                             <div class="form-group">
                                <label class="col-sm-2 control-label">Matricula</label>
                                <div class="col-sm-10">
                                    <input type="text" name='matricula' class="form-control" id="matricula">
                                </div>
                            </div>
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
                                <label class="col-sm-2 control-label">combustivel</label>
                                <div class="col-sm-10">
                                    <input type="text" name='combustivel' class="form-control" id="combustivel">
                                </div>
                            </div>
							
							<div class="form-group">
                                <label class="col-sm-2 control-label">Cilindrada</label>
                                <div class="col-sm-10">
                                    <input type="text" name='cilindrada' class="form-control" id="cilindrada">
                                </div>
                            </div>
							
							<div class="form-group">
                                <label class="col-sm-2 control-label">Nº de Cilindro</label>
                                <div class="col-sm-10">
                                    <input type="text" name='cilindro_num' class="form-control" id="cilindro_num">
                                </div>
                            </div>
							
							<div class="form-group">
                                <label class="col-sm-2 control-label">Nº do Motor</label>
                                <div class="col-sm-10">
                                    <input type="text" name='motor_num' class="form-control" id="motor_num">
                                </div>
                            </div>
							
							<div class="form-group">
                                <label class="col-sm-2 control-label">Nº do Chassis</label>
                                <div class="col-sm-10">
                                    <input type="text" name='chassis_num' class="form-control" id="chassis_num">
                                </div>
                            </div>
							
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success">Proxímo</button>
                                </div>
                            </div>
                        </form>
					</div>
				</div> <!-- Fim Caracterização -->
				
				<!-- Caracterização 2-->
											
				 <div role="tabpanel"  
					<?php if($_SESSION['control_aba'] == 2){ 
						echo "class='tab-pane active'"; 
						}else{ 
							echo "class='tab-pane'"; 
						} ?> id="messages">
					<div style="padding-top:20px;">
					 <form class="form-horizontal"  action="" method="POST">
					  <div class="form-group">
                                <label class="col-sm-2 control-label">Nº do quadro</label>
                                <div class="col-sm-10">
                                    <input type="text" name='quadro' class="form-control" id="quadro">
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-sm-2 control-label">Cor</label>
                                <div class="col-sm-10">
                                    <input type="text" name='cor' class="form-control" id="cor">
                                </div>
                            </div>
							<div class="form-group">
                                <label class="col-sm-2 control-label">Nº de Portas</label>
                                <div class="col-sm-10">
                                    <input type="text" name='porta_num' class="form-control" id="porta_num">
                                </div>
                            </div>
							
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Capacidade de Carga</label>
                                <div class="col-sm-10">
                                    <input type="text" name='capacidade' class="form-control" id="capacidade">
                                </div>
                            </div>
							
							<div class="form-group">
                                <label class="col-sm-2 control-label">Lotação</label>
                                <div class="col-sm-10">
                                    <input type="text" name='lotacao' class="form-control" id="lotacao">
                                </div>
                            </div>
							
							<div class="form-group">
                                <label class="col-sm-2 control-label">Caixa</label>
                                <div class="col-sm-10">
                                    <input type="text" name='caixa' class="form-control" id="caixa">
                                </div>
                            </div>
							
							<div class="form-group">
                                <label class="col-sm-2 control-label">Entidade proprietaria</label>
                                <div class="col-sm-10">
                                    <input type="text" name='entidade_proprietaria' class="form-control" id="entidade_proprietaria">
                                </div>
                            </div>
							
							<div class="form-group">
                                <label class="col-sm-2 control-label">Período de Afectação</label>
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
				</div> <!-- Fim Caracterização 2-->
				
				<!-- Registo de Propriedade-->
											
				 <div role="tabpanel"  
					<?php if($_SESSION['control_aba'] == 3){ 
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
                                <label class="col-sm-2 control-label">Livro IP</label>
                                <div class="col-sm-10">
                                    <input type="text" name='livro' class="form-control" id="livro">
                                </div>
                            </div>
							
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Ano de Fabrico</label>
                                <div class="col-sm-10">
                                    <input type="text" name='ano_fabrico' class="form-control" id="ano_fabrico">
                                </div>
                            </div>
							
							<div class="form-group">
                                <label class="col-sm-2 control-label">Estado de conservação</label>
                                <div class="col-sm-10">
                                    <input type="text" name='conservacao' class="form-control" id="conservacao">
                                </div>
                            </div>
							
							<div class="form-group">
                                <label class="col-sm-2 control-label">Operacionalidade</label>
                                <div class="col-sm-10">
                                    <input type="text" name='operacionalidade' class="form-control" id="operacionalidade">
                                </div>
                            </div>
							
							<div class="form-group">
                                <label class="col-sm-2 control-label">Último Control</label>
                                <div class="col-sm-10">
                                    <input type="date" name='control' class="form-control" id="control">
                                </div>
                            </div>
							
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success">Proxímo</button>
                                </div>
                            </div>
                        </form>
					</div>
				</div> <!-- Fim Registo de Propriedade-->
				
				<!-- Valorização-->
											
				 <div role="tabpanel"  
					<?php if($_SESSION['control_aba'] == 4){ 
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
                                    <select  class="form-control" name='class_despesa' id="class_despesa" >
									<option value = "">Orçamental</option>
                                    <option value = "">Patrimonial</option>
                                    <option value = "">Financiamento</option>
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
                                    <button type="submit" class="btn btn-success">Proximo</button>
                                </div>
                            </div>
                        </form>
					</div>
				</div> <!-- Fim Valorização-->
				
				
				 <!-- Seguro -->
						   
				<div role="tabpanel"  
					<?php if($_SESSION['control_aba'] == 5){ 
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
					</div><!--Fim da div padding-->
				</div> <!--Fim Seguro -->
				
				
			  </div> <!-- fim da class tab-content -->
			</div><!-- fim da div-->
		</div> <!-- fim da classe conteiner-->
		
		
		
		<script src="js/jquery-1.11.3.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>