<!DOCTYPE>
<?php
include_once 'projetoMercadoDeTrabalho.class.php';	
include_once 'projetoComunidade.class.php';	
include_once 'projetoInstitucional.class.php';

if(empty($_SESSION['usuario'])){header('location:login.php');}
else $usuario = $_SESSION['usuario'];
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
					Título: <br><input type="text" name="titulo" style="width: 100%; height: 5%"><br>
					<br>Tecnologias Utilizadas: <br> <input type="text" name="tecUtilizadas" style="width: 100%; height: 5%"><br>
					<br>Resumo: <br> <input type="text" name="resumo" style="width: 100%; height: 5%"><br>
					<br>Status:
					<input type="radio" checked="true" name="status" value="inicial">Inicial
					<input type="radio" name="status" value="andamento">Em andamento
					<input type="radio" name="status" value="concluido">Concluído<br>
					<br>Duração: <input type="text" name="duracao">
					<br>
					<br>Categoria: 
					<input type="radio" checked="true" onclick="mudara();" name="categoria" value="institucional">Institucional
					<input type="radio" onclick="mudarc();" name="categoria" value="mercadoTrabalho"> Mercado de Trabalho
					<input type="radio" onclick="mudarb();" name="categoria" value="comunidade"> Comunidade<br>
					
					<br>
					<span id="a">
					<br>
					Público Alvo: <input type="text" name="publicoAlvo" style="width: 87%; height: 5%"> 
					</span>
					<br>
					<span id="b">
					Departamento afetado:<input type="text" name="depAfetado" style="width: 81%; height: 5%"> <br> 
					<br>Resultados esperados: <input type="text" name="resultEsperado" style="width: 81%; height: 5%"> <br>
					</span>
					<span id="c">
					Área de atuação:<input type="text" name="areaAtuacao" style="width: 86%; height: 5%"> <br>
					</span>
					<br> 
					<input type="submit" value="Cadastrar">
					<input type="button" value="Cancelar" onClick='location.href="telaInicial.php"'>
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
				if(!empty($_GET['titulo'])){$titulo=$_GET['titulo'];} else { erro("Campo titulo é obrigatório!");return;}
				if(!empty($_GET['resumo'])){$resumo=$_GET['resumo'];} else { erro("Campo resumo é obrigatório!");return;}
				if(!empty($_GET['tecUtilizadas'])){$tecUtilizadas=$_GET['tecUtilizadas'];} else { erro("Campo tecnologias utilizadas é obrigatório!");return;}
				if(!empty($_GET['status'])){$status=$_GET['status'];} else { erro("Campo status é obrigatório!");return;}
				if(!empty($_GET['duracao'])){$duracao=$_GET['duracao'];} else { erro("Campo duração é obrigatório!");return;}
				if(!empty($_GET['categoria'])){$categoria=$_GET['categoria'];} else { erro("Campo categoria é obrigatório!");return;}
			
				if ($categoria=="institucional") {
					if(!empty($_GET['depAfetado'])){$depAfetado=$_GET['depAfetado'];} else { erro("Campo departamento afetado é obrigatório!");return;}
					if(!empty($_GET['resultEsperado'])){$resultEsperado=$_GET['resultEsperado'];} else { erro("Campo resultado esperado é obrigatório!");return;}
					//                                 $id, $titulo, $resumo, $tecnologiasUtilizadas, $idStatus, $duracao, $idCategoria, $departamentoAfetado, $resultadoEsperado, $idCoordenador
					$projeto = new ProjetoInstitucional (0, $titulo, $resumo, $tecUtilizadas,         $status,   $duracao, $categoria,   $depAfetado,          $resultEsperado,    $usuario->getId());
					$projeto->salvar();
					
					echo '<script>alert("Cadastrado com Sucesso.");</script>';
				}
				else if ($categoria=="mercadoTrabalho"){
					if(!empty($_GET['areaAtuacao'])){$areaAtuacao=$_GET['areaAtuacao'];} else { erro("Campo area de atuação é obrigatório!");return;}
					//                                    $id, $titulo, $resumo, $tecnologiasUtilizadas, $idStatus, $duracao, $idCategoria, $areaAtuacao, $idCoordenador
					$projeto = new ProjetoMercadoDeTrabalho(0, $titulo, $resumo, $tecUtilizadas,         $status,   $duracao, $categoria,   $areaAtuacao, $usuario->getId());
					$projeto->salvar();
					
					echo '<script>alert("Cadastrado com Sucesso.");</script>';
				}
				else if ($categoria=="comunidade"){
					if(!empty($_GET['publicoAlvo'])){$publicoAlvo=$_GET['publicoAlvo'];} else { erro("Campo publico alvo é obrigatório!");return;}
					//                                    $id, $titulo, $resumo, $tecnologiasUtilizadas, $idStatus, $duracao, $idCategoria, $publicoAlvo, $idCoordenador
					$projeto = new ProjetoMercadoDeTrabalho(0, $titulo, $resumo, $tecUtilizadas,         $status,   $duracao, $categoria,   $publicoAlvo, $usuario->getId());
					$projeto->salvar();
					
					echo '<script>alert("Cadastrado com Sucesso.");</script>';
				}
			}

	?>
	</body>
</html>