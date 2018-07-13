
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
	$alunos = Aluno::getAlunosMenosCoordenador($projeto->getCoordenador()->getId());
	$equipe = $projeto->getEquipe();
	
}
else{
	$id=0;
}
?>


