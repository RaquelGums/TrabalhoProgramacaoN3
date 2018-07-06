<!DOCTYPE> 
<?php 
session_start(); 
if(empty($_SESSION['email'])){header('location:login.php');}
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		<title>Página Inicial</title>
		<div>
			<h2>Olá <?php echo $_SESSION['nome']; ?></h2>
			<input type="button" value="Sair" onClick='location.href="logoff.php"'>
		</div>
		

	</head>
	<body>
		<table  style="width:80%; border: 2px solid; text-align: center">
			<caption>Projetos</caption>
			<tr>
				<th>Ativo</th>
				<th>Título</th>
				<th>Status</th>
				<th>Categoria</th>
				<th>Duração</th>
				<th>Público Alvo</th>
			</tr> 
			<tr>
				<td>Ativo</td>
				<td>Título</td>
				<td>Status</td>
				<td>Categoria</td>
				<td>Duração</td>
				<td>Público Alvo</td>		
			</tr>
		</table><input type="button" value="+ Novo Projeto" onClick='location.href="novoProjeto.php"'>
		<br>
		<table  style="width:80%; border: 2px solid; text-align: center">
			<caption>Concursos</caption>
			<tr>
				<th>Ativo</th>
				<th>Título</th>
				<th>Período de Inscrição</th>
				<th>Categoria</th>
				<th>Premiação</th>

			</tr> 
			<tr>
				<td>Ativo</td>
				<td>Título</td>
				<td>Data Inicial de Incrições + Data Final de Incrições</td>
				<td>Categoria</td>
				<td>Data da Premiação</td>
			</tr>
		</table><input type="button" value="+ Novo Concurso" onClick='location.href="novoConcurso.php"'>
		
	</body>
</html>