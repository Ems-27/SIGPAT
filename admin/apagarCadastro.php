<?php

require "../conexao.php";
if(isset($_GET['id'])):

$id = $_GET['id'];

$pdo = conectar();

$deletar = $pdo->prepare("DELETE FROM utilizador WHERE id =?");
$deletar->bindValue(1,$id);
$deletar->execute();

if($deletar->rowCount() > 0):
        
    echo "<script>alert('$id apagado com sucesso !')</script>";
    echo "<script>window.location='cadastro.php'</script>";

    else:
        echo "<script>alert('Erro ao apagar!')</script>";
        echo "<script>window.location='cadastro.php'</script>";
    endif;

endif;
//apresenta o nº do id delectado
//echo $_GET['id'];
?>
