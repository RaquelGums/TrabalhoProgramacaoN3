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
			<form id="area" action="novoConcurso.php" method="get">
				<button name="buttonVoltar">Voltar</button>
				<input type="submit" value="Cadastrar">
				<button name="buttonCancelar">Cancelar</button>
				<fieldset>
					<legend>Novo Concurso</legend>
					Título: <input type="text" name="titulo" style="width: 100%; height: 5%"><br>
					<br>
					Descrição: <input type="text" name="descricao" style="width:100%; height: 8%"> <br>
					<br>
					Data Inicial de Incrições <input type="date" name="dataInscriçãoInicialConcurso">
					Data Final de Incrições <input type="date" name="dataInscricaoFinalConcurso"><br>
					<br>
					Categoria: 
					<input type="radio" name="categoria" value="institucional">Institucional
					<input type="radio" name="categoria" value="comunidade"> Comunidade
					<input type="radio" name="categoria" value="mercadoTrabalho"> Mercado de Trabalho<br>
					<br>
					Data da Premiação: <input type="date" name="dataPremiacao">
					Descrição da Premiação: <input type="text" name="descricaoPremiacao" style="width: 62%; height: 5%"> <br>
					<br>Tipo de Avaliação: 
					<input type="radio" name="avaliacao" value="votacao">Votação
					<input type="radio" name="avaliacao" value="banca"> Banca de Avaliadores <br>
					<br> Ativo:
					<input type="radio" name="ativo" value="sim">Sim
					<input type="radio" name="ativo" value="nao">Não <br>
					<br>
					
				</fieldset>
			</form>
		</div>
		
		
	<?php
		if(!empty($_GET)){
			if(!empty($_GET['titulo'])){
			$titulo=$_GET['titulo'];
			}
			if(!empty($_GET['descricao'])){
			$descricao=$_GET['descricao'];
			}
			if(!empty($_GET['dataInscriçãoInicialConcurso'])){
			$dataInscriçãoInicialConcurso=$_GET['dataInscriçãoInicialConcurso'];
			}
			if(!empty($_GET['dataInscricaoFinalConcurso'])){
			$dataInscricaoFinalConcurso=$_GET['dataInscricaoFinalConcurso'];
			}
			if(!empty($_GET['categoria'])){
			$categoria=$_GET['categoria'];
			}
			if(!empty($_GET['dataPremiacao'])){
			$dataPremiacao=$_GET['dataPremiacao'];
			}
			if(!empty($_GET['descricaoPremiacao'])){
			$descricaoPremiacao=$_GET['descricaoPremiacao'];
			}
			if(!empty($_GET['avaliacao'])){
			$avaliacao=$_GET['avaliacao'];
			}
			if(!empty($_GET['ativo'])){
			$ativo=$_GET['ativo'];
			}
		}
	?>
	</body>
</html>