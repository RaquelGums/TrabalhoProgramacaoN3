<!DOCTYPE>
<html>
	<head>
		<form action="novoProjeto.php" method="get">
			<fieldset>
			<div>
				Título <br> <input type="text" name="titulo" style="width: 40%"><br>
				Tecnologias Utilizadas <br> <input type="text" name="tecUtilizadas" style="width: 40%"><br>
			</div>
			<div>
				Resumo <br> <input type="text" name="resumo" style="width: 100%;height: 5%"><br>
			</div>
			<div>
				Status <br> 
				<input type="radio" name="status" value="inicial">Inicial
				<input type="radio" name="status" value="andamento">Em andamento
				<input type="radio" name="status" value="concluido">Concluído<br>
				Duração  <br> <input type="text" name="duracao"><br>
			</div>
			<div>
				Categoria <br> 
				<input type="radio" name="categoria" value="institucional">Institucional
				<input type="radio" name="categoria" value="mercadoTrabalho"> Mercado de Trabalho
				<input type="radio" name="categoria" value="comunidade"> Comunidade<br>
				Público Alvo <br> <input type="text" name="publicoAlvo"> <br> 
			</div>
			<div>
				Departamento afetado <br> <input type="text" name="depAfetado"> <br> 
				Resultados esperados <br> <input type="text" name="resultEsperado"> <br>
				Área de atuação <br> <input type="text" name="areaAtuacao"> <br> 
			</div>
				<br> 
				<input type="submit" value="Cadastrar">
			
			</fieldset>
		</form>
	</head>
	<body>
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