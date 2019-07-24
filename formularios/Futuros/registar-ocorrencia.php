<?php
include_once("conexao.php");

$tipo = filter_input(INPUT_POST,'tipo',FILTER_SANITIZE_STRING);
$marca = filter_input(INPUT_POST,'marca',FILTER_SANITIZE_STRING);
$modelo = filter_input(INPUT_POST,'modelo',FILTER_SANITIZE_STRING);
$cor = filter_input(INPUT_POST,'cor',FILTER_SANITIZE_STRING);
$matricula = filter_input(INPUT_POST,'matricula',FILTER_SANITIZE_STRING);
$motor_num = filter_input(INPUT_POST,'motor_num',FILTER_SANITIZE_STRING);
$proprietario = filter_input(INPUT_POST,'proprietario',FILTER_SANITIZE_STRING);
$provincia = filter_input(INPUT_POST,'provincia',FILTER_SANITIZE_STRING);
$localizacao = filter_input(INPUT_POST,'localizacao',FILTER_SANITIZE_STRING);
$data_ocorrencia = filter_input(INPUT_POST,'data_ocorrencia',FILTER_SANITIZE_STRING);
$estado = filter_input(INPUT_POST,'estado',FILTER_SANITIZE_STRING);



//echo "Tipo de Ocorrencia: $tipo <br>";
//echo "Marca: $marca <br>";
//echo "Modelo: $modelo <br>";
//echo "cor: $cor <br>";
//echo "Matricula: $matricula <br>";
//echo "Numero do Motror: $motor_num <br>";
//echo "Proprietario: $proprietario <br>";
//echo "Província: $provincia <br>";
//echo "Localização da Ocorrencia: $localizacao <br>";
//echo "Província: $provincia <br>";
//echo "Data da Ocorrência: $data_ocorrencia <br>";
//echo "Estado: $estado <br>";

$capturar = "INSERT INTO ocorrencia (tipo,marca,modelo,cor,matricula,
motor_num,proprietario,provincia,localizacao,data_ocorrencia,estado) 
values('$tipo','$marca','$modelo','$cor','$matricula','$motor_num',
'$proprietario','$provincia','$localizacao','$data_ocorrencia','$estado')";
$cadastrar = mysqli_query($conn,$capturar);

header("location:ocorrencia.php");

?>