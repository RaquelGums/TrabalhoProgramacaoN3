<!DOCTYPE>
<html>
	<head>
		<form action="novoProjeto.php" method="get">
			<fieldset>
			<div>
				Título <input type="text" name="titulo" style="width: 40%"> 
				<br>
				Descrição <input type="text" name="descricao" style="width: 90%;height: 5%"><br>
				Data Inicial de Incrições <input type="date" name="dataInscriçãoInicialConcurso"><br>
				Data Final de Incrições <input type="date" name="dataInscricaoFinalConcurso"><br>
				Categoria 
				<input type="radio" name="categoria" value="institucional">Institucional
				<input type="radio" name="categoria" value="mercadoTrabalho"> Mercado de Trabalho
				<input type="radio" name="categoria" value="comunidade"> Comunidade<br>
				Data da Premiação <input type="date" name="dataPremiacao">
				Descrição da Premiação <input type="text" name="descricaoPremiacao" style="width: 40%"> <br>
				Tipo de Avaliação 
				<input type="radio" name="avaliacao" value="votacao">Votação
				<input type="radio" name="avaliacao" value="banca"> Banca de Avaliadores <br>
				Ativo 
				<input type="radio" name="ativo" value="sim">Sim
				<input type="radio" name="ativo" value="nao">Não <br>
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