<!DOCTYPE>
<?php 
session_start(); 
if(!empty($_SESSION['email'])){header('location:telaInicial.php');}
if(!empty($_POST['mensagem'])){echo $_POST['mensagem'];}
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
				<legend>Novo Usuário</legend>
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
		<?php 
		function erro()
		{
			$_POST['mensagem'] = "complete todos os campos!";
			header('location:cadastroUsuario.php');
		}

		if(!empty($_POST)){
			if(!empty($_POST['nome'])){ $nome=$_POST['nome'];} else { erro(); }
			if(!empty($_POST['email'])){ $email=$_POST['email'];} else { erro(); }
			if(!empty($_POST['senha'])){ $senha=$_POST['senha'];} else { erro(); }
			if(!empty($_POST['tipoUsuario'])){ $tipoUsuario=$_POST['tipoUsuario'];} else { erro(); }
			if(!empty($_POST['matri'])){ $matricula=$_POST['matri'];}
			if(!empty($_POST['siape'])){ $siape=$_POST['siape'];}
		
		// linhas responsáveis em se conectar com o bando de dados.
			$db = new PDO('mysql:host=localhost;dbname=db.ifrs;charset=utf8','root','root'); 
			//$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			if ($tipoUsuario=="1") {
				$r=$db->prepare("INSERT INTO usuario(nomeUsuario, emailUsuario, senhaUsuario, tipoUsuario, usuarioAtivo, matricula ) 
								VALUES  (:nome, :email, :senha, :tipoUsuario, :ativo, :matricula )");
			$r->execute(array(':nome'=>$nome,':email'=>$email,':senha'=>$senha,':tipoUsuario'=>$tipoUsuario,':ativo'=>1,':matricula'=>$matricula));
			}
			else{
			$r=$db->prepare("INSERT INTO usuario(nomeUsuario, emailUsuario, senhaUsuario, tipoUsuario, usuarioAtivo, siape ) 
								VALUES  (:nome, :email, :senha, :tipoUsuario, :ativo, :siape )");
			$r->execute(array(':nome'=>$nome,':email'=>$email,':senha'=>$senha,':tipoUsuario'=>$tipoUsuario,':ativo'=>1,':siape'=>$siape));
			}
		}
?>
	</body>
</html>