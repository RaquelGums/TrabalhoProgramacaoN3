<!DOCTYPE>
<?php 
session_start(); 
if(empty($_SESSION['email'])){header('location:login.php');}
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		<script>
			function mudara() ///trocar as caixas de professor e aluno
			{
    			document.getElementById("a").style.display = "none"; 
				document.getElementById("b").style.display = "block"; 
				document.getElementById("c").style.display = "none"; 
			}
			function mudarb() ///trocar as caixas de professor e aluno
			{
    			document.getElementById("a").style.display = "block"; 
				document.getElementById("b").style.display = "none"; 
				document.getElementById("c").style.display = "none"; 
			}
			function mudarc() ///trocar as caixas de professor e aluno
			{
    			document.getElementById("a").style.display = "none"; 
				document.getElementById("b").style.display = "none"; 
				document.getElementById("c").style.display = "block"; 
			}
			mudara();
		</script>		
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
					<input type="radio" checked="true" name="status" value="inicial">Inicial
					<input type="radio" name="status" value="andamento">Em andamento
					<input type="radio" name="status" value="concluido">Concluído<br>
					<br>Duração: <input type="text" name="duracao">
					<br>
					<br>Categoria: 
					<input type="radio" checked="true" onclick="mudara();" name="categoria" value="institucional">Institucional
					<input type="radio" onclick="mudarc();" name="categoria" value="mercadoTrabalho"> Mercado de Trabalho
					<input type="radio" onclick="mudarb();" name="categoria" value="comunidade"> Comunidade<br>
					
					<br>
					<span id="a">
					<br>
					Público Alvo: <input type="text" name="publicoAlvo" style="width: 87%; height: 5%"> 
					</span>
					<br>
					<span id="b">
					Departamento afetado:<input type="text" name="depAfetado" style="width: 81%; height: 5%"> <br> 
					<br>Resultados esperados: <input type="text" name="resultEsperado" style="width: 81%; height: 5%"> <br>
					</span>
					<span id="c">
					Área de atuação:<input type="text" name="areaAtuacao" style="width: 86%; height: 5%"> <br>
					</span>
					<br> 
					<input type="submit" value="Cadastrar">
					<input type="button" value="Cancelar" onClick='location.href="telaInicial.php"'>
				</fieldset>
				<script>mudara();</script>
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