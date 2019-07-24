
<?php 

    require "conexao.php";
  // session_start();
  
?>

<fieldset align="center">
		     <legend><strong>Informacoes do Usuario</strong></legend>

                     <div Align="center">
<form action="gravarCadastro.php" class="form-signin" method="post" enctype="multipart/form-data">                                                  
<table border="2" cellpadding="10" cellspacing="1">
    <tr>
        
        <td rowspan="1" align="center" style="background-color:#cccccc;"><strong>Nome</strong></td>
        <td rowspan="1" align="center" style="background-color:#cccccc;"><strong>Sobre Nome</strong></td>
        <td rowspan="1" align="center" style="background-color:#cccccc;"><strong>Email</strong></td>
        <td colspan="1" align="center" style="background-color:#cccccc;"><strong>Categoria</strong></td>
        <td colspan="1" align="center" style="background-color:#cccccc;"><strong>Actualizar</strong></td> 
        <td colspan="1" align="center" style="background-color:#cccccc;"><strong>Apagar</strong></td>
    </tr>
    
<?php    
      $pdo = conectar();

    $lista = $pdo->prepare("SELECT * FROM utilizador");
    $lista->execute();

    $utilizador = $lista->fetchAll(PDO::FETCH_ASSOC);
       
foreach($utilizador as $utilizadores):  
?> 
    <tr>
      
        <td><?php echo $utilizadores['prinome']; ?></td>
    
        <td><?php echo $utilizadores['ultnome']; ?></td>
        
        <td><?php echo $utilizadores['email']; ?></td>
    
       <td><?php echo $utilizadores['categoria']; ?></td>
        
                
         <td><a href="actCadastro.php?id=<?php echo $utilizadores['id']; ?>">Actualizar</a></td>                   
         <td><a href="apagarCadastro.php?id=<?php echo $utilizadores['id']; ?>">Apagar</a></td>

</tr>
    
<?php   
endforeach;
?>
</table>
             </div>
                     
 <a href="index.php" class="btn text-muted text-center btn-success" type="submit" name="enviar" id="enviar">Sair</a>
                     
</fieldset>