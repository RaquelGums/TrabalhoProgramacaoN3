<!DOCTYPE>
<?php 
session_start(); 
if(!empty($_SESSION['usuario'])){header('location:telaInicial.php');}
?>
<html>
	<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<style>

	</style>
	</head>
	<body>
		<form id="areaB" method="get">
			<fieldset>
				<legend style="text-align:left;">Recuperação de Senha</legend>
				Email: <input type="text" name="email"><br>
				<br><input type="submit" value="Recuperar">
				<input type="button" value="cancelar" onClick='location.href="login.php"'>
			</fieldset>
		</form>
	</body>
</html>
