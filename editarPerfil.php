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
				<legend style="text-align:left;">Editar Perfil</legend>
				Nome: <input type="text" name="nome" value="<?php echo $usuario->getNome() ?>">
				<br/>
				<br/>
				Email: <input type="text" name="email" value="<?php echo $usuario->getEmail() ?>"/>
				<br/>
				<br/>				
				<?php 
				    if ($usuario instanceof Aluno){ //usuario é uma instancia de Aluno
						echo 'Numero da Matrícula: <input type="text" name="matri" value="'.$usuario->getMatricula().'">';				
					}
					else if ($usuario instanceof Professor){
						echo 'SIAPE: <input type="text" name="siape" value="'.$usuario->getSiape().'">';
					}
				?>
				<br>
				<br><input type="submit" value="Salvar">
				<input type="button" value="Voltar" onClick='location.href="telaInicial.php"'>
				
				<?php 
					if(!empty($_POST)){
						if(!empty($_POST['nome'])){ $nome=$_POST['nome'];} else { erro(); }
						if(!empty($_POST['email'])){ $email=$_POST['email'];} else { erro(); }
						if(!empty($_POST['matri'])){ $matricula=$_POST['matri'];}
						if(!empty($_POST['siape'])){ $siape=$_POST['siape'];}
						
						$usuario->setNome($nome);
						$usuario->setEmail($email);
						if ($usuario instanceof Aluno){
							$usuario->setMatricula($matricula);
						}
						else{
							$usuario->setSiape($siape);
						}
						$usuario->salvar();
						$_SESSION['usuario'] = $usuario;
						echo '<script>alert("Alteração realizada!"); location.href="telaInicial.php"</script>'; 
						
					}
				?>
			</fieldset>
		</form>
	</body>
</html>