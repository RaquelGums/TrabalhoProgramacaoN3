<!DOCTYPE>
<?php
include_once 'aluno.class.php';
include_once 'projetoMercadoDeTrabalho.class.php';	
include_once 'projetoComunidade.class.php';	
include_once 'projetoInstitucional.class.php';
include_once 'projeto.class.php';
session_start(); 
if(empty($_SESSION['usuario'])){header('location:telaInicial.php');}
else $usuario = $_SESSION['usuario'];

if(!Empty($_GET['id'])){
    $id = $_GET['id'];	
    $projeto = Projeto::GetProjetoById($id);	
}
else{
	$id=0;
}


?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		<script>
			function mudara() ///trocar as caixas de professor e aluno
			{
    			document.getElementById("a").style.display = "none"; 
				document.getElementById("b").style.display = "block"; 
				document.getElementById("c").style.display = "none"; 
			}
			function mudarb() ///trocar as caixas de professor e aluno
			{
    			document.getElementById("a").style.display = "block"; 
				document.getElementById("b").style.display = "none"; 
				document.getElementById("c").style.display = "none"; 
			}
			function mudarc() ///trocar as caixas de professor e aluno
			{
    			document.getElementById("a").style.display = "none"; 
				document.getElementById("b").style.display = "none"; 
				document.getElementById("c").style.display = "block"; 
			}
			mudara();
		</script>		
	</head>
	<body>
		<div>
			<form id="area" method="post">
				<fieldset>
					<legend>Novo Projeto</legend>
					Título: <br><input type="text" name="titulo" style="width: 100%; height: 5%" value="<?php if(!empty($projeto)) echo $projeto->getTitulo(); ?>"><br>
					<br>Tecnologias Utilizadas: <br> <input type="text" name="tecUtilizadas" style="width: 100%; height: 5%" value="<?php if(!empty($projeto)) echo $projeto->getTecnologiasUtilizadas(); ?>"><br>
					<br>Resumo: <br> <input type="text" name="resumo" style="width: 100%; height: 5%" value="<?php if(!empty($projeto)) echo $projeto->getResumo(); ?>"><br>
					<br>Status:
					<input type="radio" checked="true" name="status" value="1">Inicial
					<input type="radio" name="status" value="2">Em andamento
					<input type="radio" name="status" value="3">Concluído<br>
					<br>Duração: <input type="text" name="duracao" value="<?php if(!empty($projeto)) echo $projeto->getDuracao(); ?>">
					<br>
					<br>Categoria: 
					<input type="radio" checked="true" onclick="mudara();" name="categoria" value="institucional">Institucional
					<input type="radio" onclick="mudarc();" name="categoria" value="mercadoTrabalho"> Mercado de Trabalho
					<input type="radio" onclick="mudarb();" name="categoria" value="comunidade"> Comunidade<br>
					
					<br>
					<span id="a">
					<br>
					Público Alvo: <input type="text" name="publicoAlvo" style="width: 87%; height: 5%" value="<?php if(!empty($projeto) && $projeto instanceof ProjetoComunidade) echo $projeto->getPublicoAlvo(); ?>" > <br>
					</span>
					<br>
					<span id="b">
					Departamento afetado:<input type="text" name="depAfetado" style="width: 81%; height: 5%" value="<?php if(!empty($projeto) && $projeto instanceof ProjetoInstitucional) echo $projeto->getDepartamentoAfetado(); ?>"> <br> 
					<br>Resultados esperados: <input type="text" name="resultEsperado" style="width: 81%; height: 5%" value="<?php if(!empty($projeto) && $projeto instanceof ProjetoInstitucional) echo $projeto->getResultadoEsperado(); ?>"> <br>
					</span>
					<span id="c">
					<br>Área de atuação:<input type="text" name="areaAtuacao" style="width: 86%; height: 5%" value="<?php if(!empty($projeto) && $projeto instanceof ProjetoMercadoDeTrabalho) echo $projeto->getAreaAtuacao(); ?>"> <br>
					</span>
					<br> 
					<input type="submit" value="Salvar">
					<input type="button" value="Cancelar" onClick='location.href="telaInicial.php"'>
					
					<table  style="width:80%; border: 2px solid; text-align: center">
						<caption>Comentários</caption>
						<tr>
							<th>Descrição</th>
							<th>Data</th>
							<th>Usuario</th>
						</tr> 
						<?php
							$comentario=$projeto->getComentarios();
							
							for ($i=0; $i<count($comentario); $i++ ){
								$comentario = $comentario[$i];
								echo '<tr>';				
								echo '<td>'.$comentario->getDescricao().'</td>';//getTitulo () é um método
								echo '<td>'.$comentario->getDate().'</td>';
								echo '<td>'.$comentario->getIdUsuario().'</td>'; //projeto é um objeto, get status é um metodo que retorna um objeto, get descriçao irá retornar a descrição deste objeto	
								echo "<td><a href='resposta.php?id=".$projeto->getId()."'>Responder</a></td>";
								echo '</tr>';
								//$usuario->salvar();
							}
							if(empty($projetos))
								echo '<tr><td colspan="6">Nenhum comentario cadastrado!<td></tr>';
							
						?>
					</table>
					
					
				</fieldset>
				<script>mudara();</script>
			</form>	
		</div>
	<?php
		function erro($mensagem)
			{
				echo '<script>alert("'.$mensagem.'");</script>';
			}
	
			if(!empty($_POST)){
				if(!empty($_POST['titulo'])){$titulo=$_POST['titulo'];} else { erro("Campo titulo é obrigatório!");return;}
				if(!empty($_POST['resumo'])){$resumo=$_POST['resumo'];} else { erro("Campo resumo é obrigatório!");return;}
				if(!empty($_POST['tecUtilizadas'])){$tecUtilizadas=$_POST['tecUtilizadas'];} else { erro("Campo tecnologias utilizadas é obrigatório!");return;}
				if(!empty($_POST['status'])){$status=$_POST['status'];} else { erro("Campo status é obrigatório!");return;}
				if(!empty($_POST['duracao'])){$duracao=$_POST['duracao'];} else { erro("Campo duração é obrigatório!");return;}
				if(!empty($_POST['categoria'])){$categoria=$_POST['categoria'];} else { erro("Campo categoria é obrigatório!");return;}
				
				if ($categoria=="institucional") {
					if(!empty($_POST['depAfetado'])){$depAfetado=$_POST['depAfetado'];} else { erro("Campo departamento afetado é obrigatório!");return;}
					if(!empty($_POST['resultEsperado'])){$resultEsperado=$_POST['resultEsperado'];} else { erro("Campo resultado esperado é obrigatório!");return;}
					//criando um objeto Projeto
					//                                 $id, $titulo, $resumo, $tecnologiasUtilizadas, $idStatus, $duracao, $idCategoria, $departamentoAfetado, $resultadoEsperado, $idCoordenador
					$projeto = new ProjetoInstitucional ($id, $titulo, $resumo, $tecUtilizadas,         $status,   $duracao, $categoria,   $depAfetado,          $resultEsperado,    $usuario->getId());
					$projeto->salvar(); //salvando o objeto no banco de dados 
					
					echo '<script>alert("Salvo com Sucesso.");</script>';
				}
				else if ($categoria=="mercadoTrabalho"){
					if(!empty($_POST['areaAtuacao'])){$areaAtuacao=$_POST['areaAtuacao'];} else { erro("Campo area de atuação é obrigatório!");return;}
					//                                    $id, $titulo, $resumo, $tecnologiasUtilizadas, $idStatus, $duracao, $idCategoria, $areaAtuacao, $idCoordenador
					$projeto = new ProjetoMercadoDeTrabalho($id, $titulo, $resumo, $tecUtilizadas,         $status,   $duracao, $categoria,   $areaAtuacao, $usuario->getId());
					$projeto->salvar();
					
					echo '<script>alert("Salvo com Sucesso.");</script>';
				}
				else if ($categoria=="comunidade"){
					if(!empty($_POST['publicoAlvo'])){$publicoAlvo=$_POST['publicoAlvo'];} else { erro("Campo publico alvo é obrigatório!");return;}
					//                                    $id, $titulo, $resumo, $tecnologiasUtilizadas, $idStatus, $duracao, $idCategoria, $publicoAlvo, $idCoordenador
					$projeto = new ProjetoComunidade($id, $titulo, $resumo, $tecUtilizadas,         $status,   $duracao, $categoria,   $publicoAlvo, $usuario->getId());
					$projeto->salvar();
					
					echo '<script>alert("Salvo com Sucesso.");</script>';
				}
			}

	?>
	</body>
</html>