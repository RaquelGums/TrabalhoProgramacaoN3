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

	</head>
	<body>
		<form id="areaB" method="post">
				
			<fieldset>
				<legend style="text-align:left;">Novo Usuário</legend>
				Nome: <input type="text" name="nome"><br>
				<br>Email: <input type="text" name="email"><br>
				<br>Senha: <input type="password" name="senha"> <br>
				<br>
				<input onclick="mudara();" checked="true" type="radio" name="tipoUsuario" value="1">Aluno
				<input onclick="mudarp();" type="radio" name="tipoUsuario" value="2"> Professor
				<br>
				<br>
				<div id="a">Numero da Matrícula:<br><input type="text" name="matri"></div>
				<div style="display:none;" id="b"> SIAPE:  <br> <input type="text" name="siape"></div>
				<br>
				<br><input type="submit" value="Cadastrar">
				<input type="button" value="Cancelar" onClick='location.href="login.php"'>
			</fieldset>
		</form>
		<?php //passar por parametro a mensagem
			function erro($mensagem)
			{
				echo '<script>alert("'.$mensagem.'");</script>';
			}
	
			if(!empty($_POST)){
				if(!empty($_POST['nome'])){ $nome=$_POST['nome'];} else { erro("Campo nome é obrigatório!");return;}
				if(!empty($_POST['email'])){ $email=$_POST['email'];} else { erro("Campo email é obrigatório!");return;}
				if(!empty($_POST['senha'])){ $senha=$_POST['senha'];} else { erro("Campo senha é obrigatório!");return;}
				if(!empty($_POST['tipoUsuario'])){ $tipoUsuario=$_POST['tipoUsuario'];} else { erro("Campo tipo de usuario é obrigatório!");return;}
				
				if ($tipoUsuario=="1") {
					if(!empty($_POST['matri'])){ $matricula=$_POST['matri'];} else { erro("Campo matricula é obrigatório!");return;}
					$usuario = new Aluno(0, $nome, $email, $senha, true, $matricula);
					$usuario->salvar();
					
					echo '<script>alert("Cadastrado com Sucesso.");</script>';				
					$_SESSION['usuario'] = $usuario;
					header('location:telaInicial.php');
				}
				else{
					if(!empty($_POST['siape'])){ $siape=$_POST['siape'];} else { erro("Campo siape é obrigatório!");return;}
					$usuario = new Professor(0, $nome, $email, $senha, true, $siape);
					$usuario->salvar();
					
					echo '<script>alert("Cadastrado com Sucesso.");</script>';				
					$_SESSION['usuario'] = $usuario;
					header('location:telaInicial.php');
				}
			}
		?>
	</body>
</html>