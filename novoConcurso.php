<!DOCTYPE>
<?php 
session_start(); 
if(empty($_SESSION['usuario'])){header('location:login.php');}
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		<script>
			function ocultar() ///ocultar as caixas de data
			{
    			document.getElementById("a").style.display = "none"; 
			}
			function exibir()
			{
				document.getElementById("a").style.display = "block"; 
			}
		</script>
	</head>
	<body>
		<div>
			<form id="area" method="get">
				<fieldset>
					<legend>Novo Concurso</legend>
					Título: <input type="text" name="titulo" style="width: 93%; height: 5%"><br>
					<br>
					Descrição: <input type="text" name="descricao" style="width:90%; height: 8%"> <br>
					<br>
					Data Inicial de Incrições <input type="date" name="dataInscriçãoInicialConcurso">
					Data Final de Incrições <input type="date" name="dataInscricaoFinalConcurso"><br>
					<br>
					Categoria: 
					<input type="radio" name="categoria" value="institucional">Institucional
					<input type="radio" name="categoria" value="comunidade"> Comunidade
					<input type="radio" name="categoria" value="mercadoTrabalho"> Mercado de Trabalho<br>
					<br>
					Data da Premiação: <input type="date" name="dataPremiacao"><br>
					<br>Descrição da Premiação: <input type="text" name="descricaoPremiacao" style="width: 78%; height: 5%"> <br>
					<br>Tipo de Avaliação: 
					<input type="radio" onclick="exibir();" checked="true" name="avaliacao" value="votacao">Votação
					<input type="radio" onclick="ocultar();" name="avaliacao" value="banca"> Banca de Avaliadores <br>
					<br>
					<span id="a">
					Início das Inscrições: <input type="date" name="dataVotacaoInicial">
					Fim das Inscrições: <input type="date" name="dataVotacaoFinal">
					</span>
					<br>
					<br><input type="submit" value="Cadastrar">
					<input type="button" value="Cancelar" onClick='location.href="telaInicial.php"'>
				</fieldset>
			</form>
		</div>
		
		
	<?php
		if(!empty($_GET)){
			if(!empty($_GET['titulo'])){$titulo=$_GET['titulo'];}
			if(!empty($_GET['descricao'])){$descricao=$_GET['descricao'];}
			if(!empty($_GET['dataInscriçãoInicialConcurso'])){$dataInscriçãoInicialConcurso=$_GET['dataInscriçãoInicialConcurso'];}
			if(!empty($_GET['dataInscricaoFinalConcurso'])){$dataInscricaoFinalConcurso=$_GET['dataInscricaoFinalConcurso'];}
			if(!empty($_GET['categoria'])){$categoria=$_GET['categoria'];}
			if(!empty($_GET['dataPremiacao'])){$dataPremiacao=$_GET['dataPremiacao'];}
			if(!empty($_GET['descricaoPremiacao'])){$descricaoPremiacao=$_GET['descricaoPremiacao'];}
			if(!empty($_GET['avaliacao'])){$avaliacao=$_GET['avaliacao'];}
			if(!empty($_GET['ativo'])){$ativo=$_GET['ativo'];}
		}
	?>
	</body>
</html>