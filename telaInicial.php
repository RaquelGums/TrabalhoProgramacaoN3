<!DOCTYPE> 
<?php 
include_once 'professor.class.php';	
include_once 'aluno.class.php';
session_start(); 
if(empty($_SESSION['usuario'])){header('location:login.php');}
else $usuario = $_SESSION['usuario'];
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		<title>Página Inicial</title>

		<script>
			function usuario(a){
			console.log(a);
				if (a == 1) {
					location.href="editarPerfil.php";
				}
				if (a == 2){
					location.href="alterarSenha.php";
				}
				if (a == 3){
					location.href="logoff.php";
				}
			}    		
		</script>
	</head>
	<body>
	    <div style="text-align:right">
			<select name="select" onchange='usuario(this.value);'>
				<option name="usuario" selected disabled><?php echo $_SESSION['usuario']->getNome() ?></option> 
				<option value="1">Editar Perfil</option>
				<option value="2">Alterar Senha</option>
				<option value="3">Sair</option>
			</select>
		</div>
	    <br>
	    <br>	
		<br>
		<br>
		<table  style="width:80%; border: 2px solid; text-align: center">
		
		<?php 
		//$r=$db->prepare("SELECT * FROM usuario)");
		//$r->execute();
		//$r = $r->fetchAll(PDO::FETCH_NUM);

		?>
			<caption>Projetos</caption>
			<tr>
			    <th>Ativo</th>
				<th>Título</th>
				<th>Status</th>
				<th>Categoria</th>
				<th>Duração</th>
				<th>Público Alvo</th>
			</tr>
			<?php
				$projetos=$usuario->getProjetos();
				
			    for ($i=0; $i<count($projetos); $i++ ){
					$projeto = $projetos[$i];
					echo '<tr>';
					echo '<td>'.$projeto->getAtivo().'</td>'; //getAtivo () é um método					
					echo '<td>'.$projeto->getTitulo().'</td>';
					echo '<td>'.$projeto->getStatus().'</td>';
					echo '<td>'.$projeto->getCategoria().'</td>';
					echo '<td>'.$projeto->getDuracao().'</td>';
					echo '<td>'.$projeto->getPublicoAlvo().'</td>';
					echo '</tr>';
				}
				if(empty($projetos))
					echo '<tr><td colspan="6">Nenhum projeto cadastrado!<td></tr>';
				
			?>
		</table><input type="button" value="+ Novo Projeto" onClick='location.href="novoProjeto.php"'>
		<br>
		<table  style="width:80%; border: 2px solid; text-align: center">
			<caption>Concursos</caption>
			<tr>
				<th>Ativo</th>
				<th>Título</th>
				<th>Período de Inscrição</th>
				<th>Categoria</th>
				<th>Premiação</th>

			</tr> 
			<tr>
				<td>Ativo</td>
				<td>Título</td>
				<td>Data Inicial de Incrições + Data Final de Incrições</td>
				<td>Categoria</td>
				<td>Data da Premiação</td>
			</tr>
		</table><input type="button" value="+ Novo Concurso" onClick='location.href="novoConcurso.php"'>
		
	</body>
	<?php 
	    $usuario = $_SESSION['usuario'];		
		//$r=$db->prepare("SELECT * FROM usuario)");
		//$r->execute();
		//$r = $r->fetchAll(PDO::FETCH_NUM);

		?>
</html>