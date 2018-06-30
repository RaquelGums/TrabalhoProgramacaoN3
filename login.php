<!DOCTYPE>
<?php session_start(); ?>
<html>
	<head style="align:center;" >
    	<form action="login.php" method="post">
	email: <input type="text" name="email"><br>
	<br><br>
	Senha: <input type="password" name="senha"><br>
	<input type="submit" value="Entrar">
	<input type="button" value="cadastrar" onClick='location.href="cadastroUsuario.php"'>
	<input type="button" value="esqueci a senha" onClick='location.href="recuperarSenha.php"'>
	</form>
	
	</head>
	<body>
	<?php
		if(!empty($_POST)){
			if(!empty($_POST['email'])){ $email=$_POST['email'];}
			if(!empty($_POST['senha'])){ $senha=$_POST['senha'];}
			// linhas responsáveis em se conectar com o bando de dados.
			$db= new PDO('mysql:host=localhost;dbname=n3;charset=utf8','root','');
			//$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//  faz uma pesquisa na tabela de usuarios
			$r=$db->prepare("SELECT idUsuario FROM usuario WHERE emailUsuario=:email and senhaUsuario=:senha");
			$r->execute(array(':email'=>$email,':senha'=>$senha));
			$linhas=$r->fetchAll(PDO::FETCH_NUM);

			// se ela estiver encontrado algum registro vai criar sessão
			if(!empty($linhas))
			{	
				$_SESSION['email'] = $email;
				$_SESSION['senha'] = $senha;
				header('location:telainicial.php');
			}
			else{
    			unset ($_SESSION['email']);
				unset ($_SESSION['senha']);
				header('location:login.php');
			} 
		}else {
			echo("vazio");
		}
	?>
	</body>
</html>