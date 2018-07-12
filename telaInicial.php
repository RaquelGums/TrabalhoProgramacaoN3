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
		<link rel="stylesheet" type="text/css" href="css/estilo.css"><title>Projetos do ADS</title>
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
				<th>Título</th>
				<th>Descrição</th>
				<th>Status</th>
				<th>Categoria</th>
				<th>Duração</th>
				<th></th>
			</tr>
			<?php
				$projetos=$usuario->getProjetos();
				
			    for ($i=0; $i<count($projetos); $i++ ){
					$projeto = $projetos[$i];
					echo '<tr>';				
					echo '<td>'.$projeto->getTitulo().'</td>';//getTitulo () é um método
					echo '<td>'.$projeto->getResumo().'</td>';
					echo '<td>'.$projeto->getStatus()->getDescricao().'</td>'; //projeto é um objeto, get status é um metodo que retorna um objeto, get descriçao irá retornar a descrição deste objeto
					echo '<td>'.$projeto->getCategoria()->getDescricao().'</td>';
					echo '<td>'.$projeto->getDuracao().'</td>';
					echo "<td><a href='novoProjeto.php?id=".$projeto->getId()."'>Visualizar</a></td>";
					echo '</tr>';
					//$usuario->salvar();
				}
				if(empty($projetos))
					echo '<tr><td colspan="6">Nenhum projeto cadastrado!<td></tr>';
				
			?>
		</table>
		<input type="button" value="+ Novo Projeto" onClick='location.href="novoProjeto.php"'>
		<br>
		<table  style="width:80%; border: 2px solid; text-align: center">
			<caption>Concursos</caption>
			<tr>
			<?php /// 	titulo 	dataInscricaoInicial+dataInscricaoFinal 	idCategoria  	descricaoPremiacao 	ativo ?>
				<th>Ativo</th>
				<th>Título</th>
				<th>Período de Inscrição</th>
				<th>Categoria</th>
				<th>Premiação</th>

			</tr> 
			<?php
				$concursos=$usuario->getConcursos();
				
			    for ($i=0; $i<count($concursos); $i++ ){
					$concurso = $concursos[$i];
					echo '<tr>';				
					echo '<td>'.$concurso->getStatus().   '</td>';
					echo '<td>'.$concurso->getTitulo().   '</td>';
					echo '<td>'.$concurso->getPeriodo().  '</td>'; //projeto é um objeto, get status é um metodo que retorna um objeto, get descriçao irá retornar a descrição deste objeto
					echo '<td>'.$concurso->getCategoria().'</td>';
					echo '<td>'.$concurso->getPremiacao().'</td>';
					echo "<td><a href='novoProjeto.php?id=".$projeto->getId()."'>Visualizar</a></td>";
					echo '</tr>';
				}
				if(empty($concursos))
					echo '<tr><td colspan="6">Nenhum concurso cadastrado!<td></tr>';
				
			?>
		</table><input type="button" value="+ Novo Concurso" onClick='location.href="novoConcurso.php"'>
		
	</body>
	<?php 
	    $usuario = $_SESSION['usuario'];		
		//$r=$db->prepare("SELECT * FROM usuario)");
		//$r->execute();
		//$r = $r->fetchAll(PDO::FETCH_NUM);

		?>
</html>