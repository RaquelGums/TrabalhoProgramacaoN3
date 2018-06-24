<!DOCTYPE>
<html>
	<head>
	<form>
	Login: <input type="text" name="login"><br>
	<br>
	Senha: <input type="password" name="senha">
	<input type="submit" value="Entrar">
	</form>
	</head>
	<body>
	<?php
		if(!empty($_GET)){
			if(!empty($_GET['login'])){
			$senha=$_GET['login'];
			}
			if(!empty($_GET['senha'])){
			$senha=$_GET['senha'];
			}
			if ($login=='admin'){
				if ($senha==12345){
					echo "teste";
				}
			}
			else {
				echo "Dados Inválidos!";
			}
		}
	?>
	</body>
</html>