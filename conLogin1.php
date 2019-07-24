
<!--  ********************************** -->

<?php session_start();
    require "admin/conexao.php";
    
    if(isset($_POST['conLogin1'])):
        
        //pegou os dados do formulario
        
$email = addslashes($_POST['email']);
$senha1 = addslashes($_POST['senha']);
$categoria_acesso     = addslashes(trim($_POST["categoria"]));
 
//Não é preciso colocar o categoria porque encontra-se por defalt, é obrigatoriamente a escolha de um deles
if(!empty($email) AND !empty($senha1)):
    $senha1= base64_encode($senha1);
    
//Se não estiver nenhum campo vazio continua com a instrução

$pdo = conectar();
$sql = "SELECT * FROM utilizador WHERE email = ? AND senha = ? AND categoria = ?";
$verifica = $pdo->prepare($sql);
$verifica->bindValue(1,$email);
$verifica->bindValue(2,$senha1);
$verifica->bindValue(3,$categoria_acesso);
$verifica->execute();

$dados = $verifica->fetch(PDO::FETCH_ASSOC);
$_SESSION['prinome']  = $dados['prinome'];
$_SESSION['id_secao']  = $dados['id'];
$_SESSION['categoria'] = $dados['categoria'];
$_SESSION['ultnome']  = $dados['ultnome'];
if($verifica->rowCount() == 1):
    
//verififica o categoria de acesso
    switch($categoria_acesso):
    
           case "admin";
               
               $_SESSION['aberto_admin'] = true;
               header("Location:admin/index.php");
           break;
    
           case "funcionario";
               
               $_SESSION['aberto_funcionario'] = true;
               header("Location:funcionario.php");
           break;
    
    endswitch;
    
    else:
        
        if(is_dir("logs")){
           //se existir a pasta logs
            
            $data = date("d/m/y");
                 
            if($abrir = fopen("logs/erro.txt","a+")){
                fputs($abrir," o usuario ".$email." tentou logar no site dia ".$data."\n");    
            }
            
        }else{
          // se não existir a pasta logs,cria uma  
                mkdir("logs");                                 
            if($abrir = fopen("logs/erro.txt","a+")){
                fputs($abrir," o usuario ".$email." tentou logar no site dia ".$data."\n"); 
                
            }

        } 
        echo "<script>alert('Email ou Senha incorreta !')</script>";
    echo "<script>window.location='Login.php'</script>";
        
      //  echo "Usuario ou Senha incorreta !";
endif;  
        
        else: //else empty
            //se estiver qualquer campo vazio, mostra mensagem de erro 
        echo "<script>alert('Todos campos devem ser preenchidos !')</script>";
        echo "<script>window.location='Login.php'</script>";
        
    endif; //if empty
    
endif;   // if isset post enviar
?>