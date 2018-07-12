<!DOCTYPE>
<?php 
session_start(); 
if(empty($_SESSION['usuario'])){header('location:login.php');}
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/estilo.css"><title>Projetos do ADS</title>
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
			<form id="area" method="post">
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
		if(!empty($_POST)){
			if(!empty($_POST['titulo'])){$titulo=$_POST['titulo'];}
			if(!empty($_POST['descricao'])){$descricao=$_POST['descricao'];}
			if(!empty($_POST['dataInscriçãoInicialConcurso'])){$dataInscriçãoInicialConcurso=$_POST['dataInscriçãoInicialConcurso'];}
			if(!empty($_POST['dataInscricaoFinalConcurso'])){$dataInscricaoFinalConcurso=$_POST['dataInscricaoFinalConcurso'];}
			if(!empty($_POST['categoria'])){$categoria=$_POST['categoria'];}
			if(!empty($_POST['dataPremiacao'])){$dataPremiacao=$_POST['dataPremiacao'];}
			if(!empty($_POST['descricaoPremiacao'])){$descricaoPremiacao=$_POST['descricaoPremiacao'];}
			if(!empty($_POST['avaliacao'])){$avaliacao=$_POST['avaliacao'];}
			if(!empty($_POST['ativo'])){$ativo=$_POST['ativo'];}
		}

		///-------------------------------teste
		$db = new PDO('mysql:host=localhost;dbname=db.ifrs;charset=utf8','root',''); 
		$r=$db->prepare("INSERT INTO concurso(titulo, descricao, dataInscricaoInicial, dataInscricaoFinal, idCategoria, dataPremiacao, descricaoPremiacao, tipoAvaliacao, ativo)
							VALUES  (:titulo, :descricao, :dataInscricaoInicial, :dataInscricaoFinal, :idCategoria, :dataPremiacao, :descricaoPremiacao, :tipoAvaliacao, :ativo)"); 
		
		$r->execute(array(':titulo'=>$titulo,
						  ':descricao'=>$descricao,
						  ':dataInscricaoInicial'=>$dataInscriçãoInicialConcurso,
						  ':dataInscricaoFinal'=>$dataInscricaoFinalConcurso,
						  ':idCategoria'=>$categoria,
						  ':dataPremiacao'=>$dataPremiacao,
						  ':descricaoPremiacao'=>$descricaoPremiacao,
						  ':tipoAvaliacao'=>$avaliacao,
						  ':ativo'=>1));
		sleep(10);
	?>
	</body>
</html>