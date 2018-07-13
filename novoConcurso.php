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

			function datas()
			{
				var data1 = document.getElementById("data1").value;
				var data2 = document.getElementById("data2").value;
				var data3 = document.getElementById("data3").value;
				var data4 = document.getElementById("data4").value;

				var nova_data1 = parseInt(data1.split("/")[2].toString() + data1.split("/")[1].toString() + data1.split("/")[0].toString());
				var nova_data2 = parseInt(data2.split("/")[2].toString() + data2.split("/")[1].toString() + data2.split("/")[0].toString());
				var nova_data3 = parseInt(data3.split("/")[2].toString() + data3.split("/")[1].toString() + data3.split("/")[0].toString());
				var nova_data4 = parseInt(data4.split("/")[2].toString() + data4.split("/")[1].toString() + data4.split("/")[0].toString());
				 
				 
				 if (nova_data2 < nova_data1)      { alert("A Data Inicial de Incrições é maior que a Data Final.");}

 				else if (nova_data1 == nova_data2) { alert("As datas das Incrições são iguais.");}

				 if (nova_data3 > nova_data4)      { alert("A data de Início das votações é maior que a data final.");}

 				else if (nova_data3 == nova_data4) { alert("As datas das votações são iguais.");}
			}

		</script>
	</head>
	<body>
		<div>
			<form id="area" action="novoConcurso.php" method="post">
				<fieldset>
					<legend>Novo Concurso</legend>
					Título: <input type="text" name="titulo" style="width: 93%; height: 5%"><br>
					<br>
					Descrição: <input type="text" name="descricao" style="width:90%; height: 8%"> <br>
					<br>
					Data Inicial de Incrições <input id="data1" type="date" name="dataInscriçãoInicialConcurso">
					Data Final de Incrições <input id="data2" type="date" name="dataInscricaoFinalConcurso"><br>
					<br>
					Categoria: 
					<input type="radio" checked="true" name="categoria" value="1">Institucional
					<input type="radio" name="categoria" value="3"> Comunidade
					<input type="radio" name="categoria" value="2"> Mercado de Trabalho<br>
					<br>
					Data da Premiação: <input type="date" name="dataPremiacao"><br>
					<br>Descrição da Premiação: <input type="text" name="descricaoPremiacao" style="width: 78%; height: 5%"> <br>
					<br>Tipo de Avaliação: 
					<input type="radio" onclick="exibir();" checked="true" name="avaliacao" value="votacao">Votação
					<input type="radio" onclick="ocultar();" name="avaliacao" value="banca"> Banca de Avaliadores <br>
					<br>
					<span id="a">
					Início das votações: <input id="data3" type="date" name="dataVotacaoInicial">
					Fim das votações: <input  id="data4" type="date" name="dataVotacaoFinal">
					</span>
					<br>
					<br><input type="submit" onClick='datas();' value="Cadastrar">
					<input type="button" value="Cancelar" onClick='location.href="telaInicial.php"'>
				</fieldset>
			</form>
		</div>
		
		
	<?php		
		function erro($mensagem)
		{
			echo '<script>alert("'.$mensagem.'");</script>';
		}
		
		if(!empty($_POST)){
			if(!empty($_POST['titulo'])){$titulo=$_POST['titulo'];} else { erro("Campo titulo é obrigatório!");return;}
			if(!empty($_POST['descricao'])){$descricao=$_POST['descricao'];} else { erro("Campo descrição é obrigatório!");return;}
			if(!empty($_POST['dataInscriçãoInicialConcurso'])){$dataInscriçãoInicialConcurso=$_POST['dataInscriçãoInicialConcurso'];} else { erro("Campo data Inicial é obrigatório!");return;}
			if(!empty($_POST['dataInscricaoFinalConcurso'])){$dataInscricaoFinalConcurso=$_POST['dataInscricaoFinalConcurso'];} else { erro("Campo data final é obrigatório!");return;}
			if(!empty($_POST['categoria'])){$categoria=$_POST['categoria'];} else { erro("Campo categoria é obrigatório!");return;}
			if(!empty($_POST['dataPremiacao'])){$dataPremiacao=$_POST['dataPremiacao'];} else { erro("Campo data de Premiação é obrigatório!");return;}
			if(!empty($_POST['descricaoPremiacao'])){$descricaoPremiacao=$_POST['descricaoPremiacao'];} else { erro("Campo descrição da Premiação é obrigatório!");return;}
			if(!empty($_POST['avaliacao'])){$avaliacao=$_POST['avaliacao'];} else { erro("Campo avaliação é obrigatório!");return;}
		

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
		}
	?>
	</body>
</html>