<!DOCTYPE>
<?php 
include_once 'aluno.class.php';
include_once 'professor.class.php';
session_start(); 
if(empty($_SESSION['usuario'])){header('location:login.php');}
else $usuario = $_SESSION['usuario'];
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/estilo.css"><title>Projetos do ADS</title>
	</head>
	<body>
		<form id="areaB" method="post">			
			<fieldset>
				<legend style="text-align:left;">Alteração de Senha</legend>
				Senha Atual: <input type="text" name="senha"><br>
				<br>Nova Senha: <input type="text" name="senhaNova"><br>
				<br>Confirmar Senha: <input type="text" name="senhaNova1"><br>
				<br><input type="submit" value="Alterar">
				<input type="button" value="Voltar" onClick='location.href="telaInicial.php"'>
			</fieldset>
		</form>
		<?php
		if(!empty($_POST)){		
		    if(empty($_POST['senha']))
			{
				echo '<script>alert("Campo Senha Atual é obrigatório");</script>';
				return;				
			}
			if(empty($_POST['senhaNova']) || empty($_POST['senhaNova1']))
			{
				echo '<script>alert("Campos Nova senha e confirmação de senha são obrigatórios");</script>';
				return;				
			}			
			
			$senha=$_POST['senha'];
			$novaSenha=$_POST['senhaNova'];
			$novaSenha1=$_POST['senhaNova1'];
						
			//echo '<script type="text/javascript">alert("'.$usuario->alterarSenha($senha, $novaSenha, $novaSenha1).'");window.location.href= "telaInicial.php"</script>';
			echo '<script>alert("'.$usuario->alterarSenha($senha, $novaSenha, $novaSenha1).'");</script>'; //chamada do método (seu retorno)
		}
		?>
	</body>
</html>