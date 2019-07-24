

<?php 

session_start();
require "../conexao.php";

$pdo = conectar();

$lista = $pdo->prepare("SELECT * FROM comentario");
$lista->execute();

$comenta = $lista->fetchAll(PDO::FETCH_ASSOC);
$user_logado = $_SESSION['id_secao'];
?>

<fieldset color>
		     <legend color="red"><strong>Visualizacoes de Comentario</strong></legend>
                     
<table border="2" cellpadding="10" cellspacing="1" align="center">
    
    <tr>
        <td rowspan="" align="center" style="background-color:#cccccc;"><strong>Nome</strong></td>
        <td rowspan="" align="center" style="background-color:#cccccc;"><strong>Tema</strong></td>
        <td rowspan="" align="center" style="background-color:#cccccc;"><strong>Comentario</strong></td>
        <td rowspan="" align="center" style="background-color:#cccccc;"><strong>Apagar</strong></td>
    </tr>
    
<?php    
foreach($comenta as $comentas):
?> 
    <tr>
<!--  <td color="blue">      -->
        <td><?php echo $comentas['nm']; ?></td>
    
        <td><?php echo $comentas['tm']; ?></td>
        
        <td><?php echo $comentas['cmtr']; ?></td>
    
         <td><a href="apagarCmt_ADM.php?id=<?php echo $comentas['id']; ?>">Apagar</a></td>          
         
        
    </tr>
    
<?php   
endforeach;
?>
</table>

                          <div align="right">
              
		    <a href="ADM_cmtEvento.php"><input type="button" name="botao" id="botao" value="Sair"/></a>
			
			  </div>
</fieldset>