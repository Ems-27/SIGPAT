<?php
include_once("cabecalho1.php");?>
<!--3ª DIV  --- E PARA INSCREVER-SE -->
        <div id="signup" class="tab-pane">
            <form action="gravarLogin.php" class="form-signin" method="post" enctype="multipart/form-data">
                <p class="text-muted text-center btn-block btn btn-primary btn-rect">Preencha para se registar</p>
                
                <!-- <input type="text" name="filme" id="arquivo" /> -->
                 <input type="text" name="prinome" id="arquivo" pattern="^[a-zA-Z]{3,10}$" placeholder="Primeiro Nome" class="form-control" required="required" />
                 <input type="text" name="ultnome" id="arquivo" pattern="^[a-zA-Z]{3,10}$" placeholder="Ultimo Nome" class="form-control" required="required" />
<!--                <input type="text" placeholder="Nome de usuario" class="form-control" />       -->
                <input type="email" name="emai" id="arquivo"   pattern="^[a-zA-Z0-9._-]+@[a-zA-Z]+\.[a-zA-Z]+(\.[a-zA-Z]+)?" placeholder="Seu E-mail" class="form-control" required="required"/> 
                <input type="password" name="senha" id="arquivo" pattern="^[a-zA-Z0-9._-]{5,}$" placeholder="Senha" class="form-control" required="required" />
                <input type="password" name="redsenha" id="arquivo" pattern="^[a-zA-Z0-9._-]{5,}$" placeholder="Redigite a senha" class="form-control" required="required"/>
                				
								 <button class="btn text-muted text-center btn-success" type="submit" name="enviar" id="enviar">Registar</button>
         <button class="btn text-muted text-center btn-danger" type="submit" name="sair" id="sair"><a href="index.php">sair</a></button>
         
							 			
							 			
                </tr>
				
				