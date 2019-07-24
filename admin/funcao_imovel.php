<!DOCTYPE HTML>
<html lang="pt-br">  
    <head>  
        <meta charset="utf-8">
        <title>Listar Bens Imoveis</title>
		<script src="js/jquery-3.3.1.min.js"></script> 
		</head>
    <body>
		<span id="conteudo"></span>
		<script>
			var qtd_pag = 1; //quantidade de registro por página
			var pag = 1; //página inicial
			$(document).ready(function () {
				listar_imovel(pag, qtd_pag); //Chamar a função para listar os registros
			});
			
			function listar_imovel(pag, qtd_pag){
				var dados = {
					pag: pag,
					qtd_pag: qtd_pag
				}
				$.post('listar_imovel.php', dados , function(retorna){
					//Subtitui o valor no seletor id="conteudo"
					$("#conteudo").html(retorna);
				});
			}
		</script>
    </body>
</html>
