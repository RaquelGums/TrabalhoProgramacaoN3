<!DOCTYPE> 
<?php   
include_once 'aluno.class.php';
include_once 'professor.class.php';
session_start(); 
if(!empty($_SESSION['usuario'])){header('location:telaInicial.php');}
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/estilo.css"/>		
	</head>
	<body>
	    <form id="areaB" method="post">
			<fieldset>
				<legend style="text-align:left;">Login do Usuário</legend>
				Email: <input type="text" name="email"><br>
				<br>
				Senha: <input type="password" name="senha"><br>
				<br>
			    <input type="submit" value="Entrar" name="Entrar">
				<input type="button" value="Esqueci a Senha" onClick='location.href="recuperarSenha.php"'>
				<input type="button" value="Novo Cadastro" onClick='location.href="cadastroUsuario.php"'>
			</fieldset>
		</form>
	</body>
	<?php
		if(!empty($_POST)){		
			if(!empty($_POST['email'])){$email=$_POST['email'];}
			if(!empty($_POST['senha'])){$senha=$_POST['senha'];}
			
						
			// linhas responsáveis em se conectar com o bando de dados.
			$db = new PDO('mysql:host=localhost;dbname=db.ifrs;charset=utf8','root','root'); 
			//$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//  faz uma pesquisa na tabela de usuarios
			$r=$db->prepare("SELECT id, nome, tipo, matricula, siape FROM usuario WHERE email=:email and senha=:senha");
			$r->execute(array(':email'=>$email,':senha'=>$senha));
			$linhas=$r->fetchAll(PDO::FETCH_NUM);

			// se ela estiver encontrado algum registro vai criar sessão
			if(!empty($linhas))
			{				
				
				if( $linhas[0][2] == 1){
					//($id, $nome, $email, $senha, $ativo, $matricula)
					$usuario = new Aluno($linhas[0][0], $linhas[0][1], $email, $senha, 1, $linhas[0][3]);
				}
				else if( $linhas[0][2] == 2){
					$usuario = new Professor($linhas[0][0], $linhas[0][1], $email, $senha, 1, $linhas[0][4]);
				}				
				$_SESSION['usuario'] = $usuario;
				header('location:telaInicial.php');
			}
			else{
		        echo '<script>alert("Falha no login, tente novamente!");</script>';
    			unset ($_SESSION['email']);
				unset ($_SESSION['senha']);
				//header('location:login.php');
			} 
		}
	?>
</html>