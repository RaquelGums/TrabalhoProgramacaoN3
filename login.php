<!DOCTYPE> 
<?php 
session_start(); 
if(!empty($_SESSION['email'])){header('location:telaInicial.php');}
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
    <form id="areaB" method="post">
		<fieldset>
		<legend style="text-align:left;">Login do Usuário</legend>
			Email: <input type="text" name="email"><br>
			<br>
			Senha: <input type="password" name="senha"><br>
			<br><input type="submit" value="Entrar">
			<input type="button" value="Esqueci a Senha" onClick='location.href="recuperarSenha.php"'>
			<input type="button" value="Novo Cadastro" onClick='location.href="cadastroUsuario.php"'>
		</fieldset>
	</form>
	</head>
	<body>
	<?php
		if(!empty($_POST)){
			if(!empty($_POST['email'])){ $email=$_POST['email'];}
			if(!empty($_POST['senha'])){ $senha=$_POST['senha'];}
			// linhas responsáveis em se conectar com o bando de dados.
			$db = new PDO('mysql:host=localhost;dbname=db.ifrs;charset=utf8','root',''); 
			//$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//  faz uma pesquisa na tabela de usuarios
			$r=$db->prepare("SELECT idUsuario FROM usuario WHERE emailUsuario=:email and senhaUsuario=:senha");
			$r->execute(array(':email'=>$email,':senha'=>$senha));
			$linhas=$r->fetchAll(PDO::FETCH_NUM);

			// se ela estiver encontrado algum registro vai criar sessão
			if(!empty($linhas))
			{	
				$n=$db->prepare("SELECT nomeUsuario FROM usuario WHERE emailUsuario=:email and senhaUsuario=:senha");
				$n->execute(array(':email'=>$email,':senha'=>$senha));
				$linha=$n->fetchAll(PDO::FETCH_NUM);
				$_SESSION['nome'] = $linha[0][0];
				$_SESSION['email'] = $email;
				$_SESSION['senha'] = $senha;
				header('location:telaInicial.php');
			}
			else{
    			unset ($_SESSION['email']);
				unset ($_SESSION['senha']);
				header('location:login.php');
			} 
		}
	?>
	</body>
</html>