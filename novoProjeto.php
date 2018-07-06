<!DOCTYPE>
<?php 
session_start(); 
if(empty($_SESSION['email'])){header('location:login.php');}
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/estilo.css">		
	</head>
	<body>
		<div>
			<form id="area" method="get">
				<fieldset>
					<legend>Novo Projeto</legend>
					Título: <br><input type="text" name="titulo" style="width: 100%; height: 5%"><br>
					<br>Tecnologias Utilizadas: <br> <input type="text" name="tecUtilizadas" style="width: 100%; height: 5%"><br>
					<br>Resumo: <br> <input type="text" name="resumo" style="width: 100%; height: 5%"><br>
					<br>Status:
					<input type="radio" name="status" value="inicial">Inicial
					<input type="radio" name="status" value="andamento">Em andamento
					<input type="radio" name="status" value="concluido">Concluído<br>
					<br>Categoria: 
					<input type="radio" name="categoria" value="institucional">Institucional
					<input type="radio" name="categoria" value="mercadoTrabalho"> Mercado de Trabalho
					<input type="radio" name="categoria" value="comunidade"> Comunidade<br>
					<br>Duração: <input type="text" name="duracao">
					Público Alvo: <input type="text" name="publicoAlvo" style="width: 57%; height: 5%"> <br>
					<br>Departamento afetado:<input type="text" name="depAfetado" style="width: 81%; height: 5%"> <br> 
					<br>Resultados esperados:<input type="text" name="resultEsperado" style="width: 81%; height: 5%"> <br>
					<br>Área de atuação:<input type="text" name="areaAtuacao" style="width: 86%; height: 5%"> <br> 
					<br> 
					<input type="submit" value="Cadastrar">
					<input type="button" value="Cancelar" onClick='location.href="telaInicial.php"'>
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