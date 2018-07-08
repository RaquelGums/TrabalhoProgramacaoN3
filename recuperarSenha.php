<!DOCTYPE>
<?php 
include_once 'aluno.class.php';	
include_once 'professor.class.php';	
session_start(); 
if(!empty($_SESSION['usuario'])){header('location:telaInicial.php');}
?>
<html>
	<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
		<script>
			function mudarp() ///trocar as caixas de professor e aluno
			{
    			document.getElementById("a").style.display = "none"; 
				document.getElementById("b").style.display = "block"; 
			}
			function mudara()
			{
				document.getElementById("b").style.display = "none";
				document.getElementById("a").style.display = "block"; 
			}
			mudara();
		</script>
	<style>

	</style>
	</head>
	<body>
		<form id="areaB" method="post">
			<fieldset>
				<legend style="text-align:left;">Recuperação de Senha</legend>
				Email: <input type="text" name="email"><br>
				<br>
				<input onclick="mudara();" checked="true" type="radio" name="tipoUsuario" value="1">Aluno
				<input onclick="mudarp();" type="radio" name="tipoUsuario" value="2"> Professor
				<br>
				<br>
				<div id="a">Numero da Matrícula:<br><input type="text" name="matricula"></div>
				<div style="display:none;" id="b"> SIAPE:  <br> <input type="text" name="siape"></div>
				<br>
				<br><input type="submit" value="Recuperar">
				<input type="button" value="cancelar" onClick='location.href="login.php"'>
			</fieldset>
		</form>
		<?php
			if(!empty($_POST)){		
				if(!empty($_POST['email'])){$email=$_POST['email'];}
				if(!empty($_POST['matricula'])){$matricula=$_POST['matricula'];}
				if(!empty($_POST['siape'])){$siape=$_POST['siape'];}
				if(!empty($_POST['tipoUsuario'])){ $tipoUsuario=$_POST['tipoUsuario'];}
				
				if ($tipoUsuario=="1") {
					echo '<script type="text/javascript">alert("'.Aluno::recuperarSenha($email, $matricula).'");window.location.href= "login.php"</script>';
					//chamada do metodo static	
				}
				else {
					echo '<script type="text/javascript">alert("'.Professor::recuperarSenha($email, $siape).'");window.location.href= "login.php"</script>';
					//chamada do metodo static	
				}
			}	
		?>
	</body>
</html>
