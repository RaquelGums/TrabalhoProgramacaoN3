<!DOCTYPE>
<html>
	<head>
		<form action="cadastro.php">
			<input type="radio" name="opcao" value="aluno"> Aluno
			<input type="radio" name="opcao" value="professor"> Professor
			<input type="submit" value="Continuar">
		</form>
	</head>
	<body>
	<?php
		if(!empty($_GET)){
			if(!empty($_GET['professor'])){
			$professor=$_GET['professor'];
			}
			if(!empty($_GET['aluno'])){
			$aluno=$_GET['aluno'];
			}
			if(value==aluno){
				"<form action="cadastro.php">
					Nome<input type="text" name="nome">
					Número da Matrícula<input type="text" name="numMatricula">
					E-mail<input type="text" name="email">
					Senha<input type="text" name="senha">
					<input type="submit" value="Continuar">
				</form>"
			}
		}
	?>
	</body>
</html>