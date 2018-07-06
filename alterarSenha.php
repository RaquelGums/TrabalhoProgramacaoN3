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
		<form id="areaB" method="get">			
			<fieldset>
				<legend>Alteração de Senha</legend>
				Email: <input type="text" name="email"><br>
				<br>Senha Atual: <input type="text" name="senha"><br>
				<br>Nova Senha: <input type="text" name="senhaNova"><br>
				<br><input type="submit" value="Alterar">
				<button value="cancelar">Cancelar
			</fieldset>
		</form>
	</body>
</html>