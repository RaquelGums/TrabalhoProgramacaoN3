<?php	
include_once 'projeto.class.php';
include_once 'concurso.class.php';

class Usuario{
	private $id;
	private $nome;
	private $email;
	private $senha;
	private $ativo; //atributo
	
	function __construct($id, $nome, $email, $senha, $ativo) { //metodo construtor, onde $id e demais são parametros
		$this->id = $id;
	    $this->nome=$nome;
	    $this->email=$email;
	    $this->senha=$senha;
	    $this->ativo=$ativo;
	}	
    function setId($id){
		$this->id = $id;
	}	
	function getId(){
		return $this->id;
	}				
	function getNome(){
		return $this->nome;
	}
	function setNome($novo_nome){
		$this->nome = $novo_nome;
	}				
	function getEmail(){
		return $this->email;
	}
	function setEmail($novo_email){
		$this->email = $novo_email;
	}
	function getSenha(){
		return $this->senha;
	}
	function setSenha($novo_senha){
		$this->senha = $novo_senha;
	}				
	function getTipoUsuario(){
		return $this->tipoUsuario;
	}			
	function getAtivo(){
		return $this->ativo;
	}
	function setAtivo($altera_ativo){
		$this->ativo = $altera_ativo;
	}
	
	function alterarSenha($senha, $novaSenha, $novaSenha1){	
		
		if($senha==$this->senha){
			if($novaSenha==$novaSenha1){
				if($senha!=$novaSenha){
					$db = new PDO('mysql:host=localhost;dbname=db.ifrs;charset=utf8','root','');
					$r=$db->prepare("UPDATE usuario SET senha=:senha where id=:id"); 
					$r->execute(array(':senha'=>$novaSenha,
									':id'=>$this->getId()));
					$this->setSenha($novaSenha);
					return "Alterado com sucesso.";
				}
				return "A nova senha não pode ser igual a senha atual.";
			}
			return "A nova senha não coincide com a confirmação.";
		}
		return "Senha atual incorreta";
	}
	
	function getUsuarioById($id){
		$db = new PDO('mysql:host=localhost;dbname=db.ifrs;charset=utf8','root','');
	    $r=$db->prepare("SELECT id, nome, email, senha, tipo, ativo, siape, matricula FROM usuario WHERE id=:id");
	    $r->execute(array(':id'=>$id));
	    $linhas=$r->fetchAll(PDO::FETCH_NUM);//fetchAll só existe nos comandos select; $linhas é um array com o resultado da consulta
	    
	    
	    if(!empty($linhas)){
	    	if ($linhas[0][4]==1) {
                                    //$id          , $nome        , $email       , $senha       , $ativo      , $matricula				
	    		$usuario = new Aluno ($linhas[0][0], $linhas[0][1], $linhas[0][2], $linhas[0][3],$linhas[0][5], $linhas[0][7]);
	    	}
	    	else if ($linhas[0][4]==2) {				
                                         //$id         , $nome        , $email       , $senha       , $ativo      , $siape
	    		$usuario = new Professor ($linhas[0][0], $linhas[0][1], $linhas[0][2], $linhas[0][3],$linhas[0][5], $linhas[0][6]);
	    	}
	    	return $usuario;
	    }
	}
	function getConcursos(){
		/*$db = new PDO('mysql:host=localhost;dbname=db.ifrs;charset=utf8','root',''); //conexao com banco
		//  faz uma pesquisa na tabela de concurso
		$r=$db->prepare("select * from concurso "); //prepara o comando 
		$r->execute(); //substitui as variaveis (:) do comando e executa
		$linhas=$r->fetchAll(PDO::FETCH_NUM); //fetchAll só existe nos comandos select; $linhas é um array com o resultado da consulta
		*/
		$array = array();
		/*
		for($i=0; $i < count($linhas) ; $i++){
			//            0	id 	1titulo 	2descricao 	3dataInscricaoInicial 	4dataInscricaoFinal 	5idCategoria 	6dataPremiacao 	7descricaoPremiacao 	8tipoAvaliacao 	9ativo 	10projetoVencedor
            //$id,$titulo,$resumo,$tecnologiasUtilizadas,$idStatus,$duracao,$idCategoria,$publicoAlvo,$departamentoAfetado,$resultadoEsperado,$areaAtuacao
			$concurso = new Concurso ($linhas[$i][0],$linhas[$i][1],$linhas[$i][2],$linhas[$i][3],$linhas[$i][4],$linhas[$i][5],$linhas[$i][6],$linhas[$i][7],$linhas[$i][8],$linhas[$i][9],$linhas[$i][10]);
			$array[$i]=$concurso; 
		}*/
		return $array;
	}

	function getProjetos(){
		$db = new PDO('mysql:host=localhost;dbname=db.ifrs;charset=utf8','root',''); //conexao com banco
		//  faz uma pesquisa na tabela de projeto
		$r=$db->prepare("select * from projeto"); //prepara o comando 
		$r->execute(); //substitui as variaveis (:) do comando e executa
		$linhas=$r->fetchAll(PDO::FETCH_NUM); //fetchAll só existe nos comandos select; $linhas é um array com o resultado da consulta
		
		$array = array();
		for($i=0; $i < count($linhas) ; $i++){
			if ($linhas[$i][6]==1) {
				//instanciando um objeto espelho do projeto no banco de dados
				//instanciando um objeto da classe ProjetoInstitucional
				//                                   $id,           $titulo,       $resumo,       $tecnologiasUtilizadas, $idStatus,       $duracao,      $idCategoria,    $departamentoAfetado,   $resultadoEsperado, $idCoordenador
				$projeto = new ProjetoInstitucional ($linhas[$i][0], $linhas[$i][1], $linhas[$i][2], $linhas[$i][3],          $linhas[$i][4],   $linhas[$i][5], $linhas[$i][6],   $linhas[$i][8],          $linhas[$i][9],      $linhas[$i][11]);
			}
			else if ($linhas[$i][6]==2) {
				//instanciando um objeto da classe ProjetoMercadoDeTrabalho
				//                                      $id,           $titulo,       $resumo,       $tecnologiasUtilizadas, $idStatus,       $duracao,      $idCategoria,  $areaAtuacao,  $idCoordenador
				$projeto = new ProjetoMercadoDeTrabalho($linhas[$i][0], $linhas[$i][1], $linhas[$i][2], $linhas[$i][3],          $linhas[$i][4],   $linhas[$i][5], $linhas[$i][6], $linhas[$i][10], $linhas[$i][11]);
			}
			else if ($linhas[$i][6]==3) {
				//instanciando um objeto da classe ProjetoComunidade
				//                               $id,           $titulo,       $resumo,       $tecnologiasUtilizadas, $idStatus,       $duracao,      $idCategoria,  $publicoAlvo,  $idCoordenador
				$projeto = new ProjetoComunidade($linhas[$i][0], $linhas[$i][1], $linhas[$i][2], $linhas[$i][3],          $linhas[$i][4],   $linhas[$i][5], $linhas[$i][6], $linhas[$i][7], $linhas[$i][11]);
			}
			////                      $id           , $titulo      , $resumo       , $tecnologiasUtilizadas, $idStatus     , $duracao     , $idCategoria , $idCoordenador
			//$projeto = new Projeto ($linhas[$i][0],$linhas[$i][1],$linhas[$i][2] ,$linhas[$i][3],          $linhas[$i][4],$linhas[$i][5],$linhas[$i][6],$linhas[$i][7],$linhas[$i][8],        $linhas[$i][9],      $linhas[$i][10],$linhas[$i][11]);
			$array[$i]=$projeto; 
		}
		return $array;
	}
}
?>