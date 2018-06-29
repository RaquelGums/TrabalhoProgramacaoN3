<!DOCTYPE>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		<style>
			body {
				background-image: url(fundo.jpg);
			}
		</style>		
	</head>
	<body>
		<div>
			<form id="area" action="novoProjeto.php" method="get">
				<fieldset>
					<legend>Novo Projeto</legend>
					<br>Título: <br> <input type="text" name="titulo" style="width: 100%; height: 5%"><br>
					<br>Tecnologias Utilizadas: <br> <input type="text" name="tecUtilizadas" style="width: 100%; height: 5%"><br>
					<br>Resumo: <br> <input type="text" name="resumo" style="width: 100%; height: 5%"><br>
					<br>Status:
					<input type="radio" name="status" value="inicial">Inicial
					<input type="radio" name="status" value="andamento">Em andamento
					<input type="radio" name="status" value="concluido">Concluído<br>
					<br>Duração: <input type="text" name="duracao"><br>
					<br>Categoria: 
					<input type="radio" name="categoria" value="institucional">Institucional
					<input type="radio" name="categoria" value="mercadoTrabalho"> Mercado de Trabalho
					<input type="radio" name="categoria" value="comunidade"> Comunidade<br>
					<br>Público Alvo: <input type="text" name="publicoAlvo" style="width: 25%; height: 5%"> 
					Departamento afetado:<input type="text" name="depAfetado" style="width: 25%; height: 5%"> <br> 
					<br>Resultados esperados: <br> <input type="text" name="resultEsperado" style="width: 100%; height: 5%"> <br>
					<br>Área de atuação: <br> <input type="text" name="areaAtuacao" style="width: 100%; height: 5%"> <br> 
					<br> 
					<input type="submit" value="Cadastrar">
				</fieldset>
			</form>	
		</div>
	<?php
		if(!empty($_GET)){
			if(!empty($_GET['titulo'])){
			$titulo=$_GET['titulo'];
			}
			if(!empty($_GET['resumo'])){
			$resumo=$_GET['resumo'];
			}
			if(!empty($_GET['tecUtilizadas'])){
			$tecUtilizadas=$_GET['tecUtilizadas'];
			}
			if(!empty($_GET['status'])){
			$status=$_GET['status'];
			}
			if(!empty($_GET['duracao'])){
			$duracao=$_GET['duracao'];
			}
			if(!empty($_GET['categoria'])){
			$categoria=$_GET['categoria'];
			}
			if(!empty($_GET['publicoAlvo'])){
			$publicoAlvo=$_GET['publicoAlvo'];
			}
			if(!empty($_GET['depAfetado'])){
			$depAfetado=$_GET['depAfetado'];
			}
			if(!empty($_GET['resultEsperado'])){
			$resultEsperado=$_GET['resultEsperado'];
			}
			if(!empty($_GET['areaAtuacao'])){
			$areaAtuacao=$_GET['areaAtuacao'];
			}
		}

	?>
	</body>
</html>