
<?php
//conexão com o banco de dados
include("../conexao.php");
$pdo=conectar();

       
    $pri_nome = $_POST['prinome'];
    $ult_nome = $_POST['ultnome'];
    $email = $_POST['emai'];
   // $senha1 = $_POST['senha'];
    //$senha2 = $_POST['redsenha'];
    $categoria = $_POST['cat'];
    $id=$_POST["id"];
    
   
    //realizando a consulta  */
    $actualizarusuario=$pdo->prepare(" UPDATE utilizador SET nome=?, nome=?, email=?, categoria=? where ID=?");
    $actualizarusuario->bindParam(1, $pri_nome);
    $actualizarusuario->bindParam(2, $ult_nome);
    $actualizarusuario->bindParam(3, $email);
   // $actualizarusuario->bindParam(4, $senha1);
   // $actualizarusuario->bindParam(5, $senha2);
    $actualizarusuario->bindParam(4,$categoria);
    $actualizarusuario->bindParam(5, $id);
    $actualizarusuario->execute();
    if($actualizarusuario->rowCount() > 0):
        echo "USUARIO ACTUALIZADO COM SUCESSO";
            
        header("Location: cadastro.php");
        
        else:
            echo " DESCULPA, O USUARIO NÃO FOI ACTUALIZADO";    
        
  //  endif;

//else:
    echo 'nenhum ususario encontrado, por favor informar os dados';
    
   endif;
   
?>