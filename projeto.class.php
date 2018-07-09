<?php
include_once 'status.class.php';
include_once 'categoria.class.php';
include_once 'projetoInstitucional.class.php';


class Projeto{
	private $id;
	private $titulo;
	private $resumo;
	private $tecnologiasUtilizadas;
	private $status;
	private $duracao;
	private $categoria;
	private $idCoordenador;
	
	function __construct($id, $titulo, $resumo, $tecnologiasUtilizadas, $idStatus, $duracao, $idCategoria, $idCoordenador) {
		$this-> id = $id;
		$this-> titulo = $titulo;
		$this-> resumo = $resumo;
		$this-> tecnologiasUtilizadas = $tecnologiasUtilizadas;
		$this-> status = new Status($idStatus);
		$this-> duracao = $duracao;
		$this-> categoria = new Categoria($idCategoria);
		$this-> idCoordenador = $idCoordenador;
	}
	
	public static function GetProjetoById($id){
		$db = new PDO('mysql:host=localhost;dbname=db.ifrs;charset=utf8','root','');
		$r=$db->prepare("SELECT id, titulo, resumo, tecnologiasUtilizadas, idStatus, duracao, idCategoria, publicoAlvo, departamentoAfetado, resultadoEsperado, areaAtuacao, idCoordenador FROM projeto WHERE id=:id");
		$r->execute(array(':id'=>$id));
		$linhas=$r->fetchAll(PDO::FETCH_NUM);//fetchAll só existe nos comandos select; $linhas é um array com o resultado da consulta
		
		
		if(!empty($linhas)){
			if ($linhas[0][6]==1) {
				//instanciando um objeto espelho do projeto no banco de dados
				//instanciando um objeto da classe ProjetoInstitucional
				//                                   $id,           $titulo,       $resumo,       $tecnologiasUtilizadas, $idStatus,       $duracao,      $idCategoria,    $departamentoAfetado,   $resultadoEsperado, $idCoordenador
				$projeto = new ProjetoInstitucional ($linhas[0][0], $linhas[0][1], $linhas[0][2], $linhas[0][3],          $linhas[0][4],   $linhas[0][5], $linhas[0][6],   $linhas[0][8],          $linhas[0][9],      $linhas[0][11]);
			}
			else if ($linhas[0][6]==2) {
				//instanciando um objeto da classe ProjetoMercadoDeTrabalho
				//                                      $id,           $titulo,       $resumo,       $tecnologiasUtilizadas, $idStatus,       $duracao,      $idCategoria,  $areaAtuacao,  $idCoordenador
				$projeto = new ProjetoMercadoDeTrabalho($linhas[0][0], $linhas[0][1], $linhas[0][2], $linhas[0][3],          $linhas[0][4],   $linhas[0][5], $linhas[0][6], $linhas[0][10], $linhas[0][11]);
			}
			else if ($linhas[0][6]==3) {
				//instanciando um objeto da classe ProjetoComunidade
				//                               $id,           $titulo,       $resumo,       $tecnologiasUtilizadas, $idStatus,       $duracao,      $idCategoria,  $publicoAlvo,  $idCoordenador
				$projeto = new ProjetoComunidade($linhas[0][0], $linhas[0][1], $linhas[0][2], $linhas[0][3],          $linhas[0][4],   $linhas[0][5], $linhas[0][6], $linhas[0][7], $linhas[0][11]);
			}
			return $projeto;
		}	
	}
	
	function setId($id){
		$this->id = $id;
	}	
	function getId(){
		return $this->id;
	}
	function getTitulo(){
		return $this->titulo;
	}
	function setTitulo($novo_titulo){
		$this->titulo = $novo_titulo;
	}				
	function getResumo(){
		return $this->resumo;
	}
	function setResumo($novoResumo){
		$this->resumo = $novoResumo;
	}
	function getTecnologiasUtilizadas(){
		return $this->tecnologiasUtilizadas;
	}
	function setTecnologiasUtilizadas($novaTecnologiasUtilizadas){
		$this->tecnologiasUtilizadas = $novaTecnologiasUtilizadas;
	}				
	function getStatus(){
		return $this->status;
	}
	function setStatus($alteraStatus){
		$this->status = $alteraStatus;
	}
	function getDuracao(){
		return $this->duracao;
	}
	function setDuracao($novaDuracao){
		$this->duracao = $novaDuracao;
	}
	function getCategoria(){
		return $this->categoria;
	}
	function setCategoria($novaCategoria){
		$this->categoria = $novaCategoria;
	}
	function getIdCoordenador(){
		return $this->idCoordenador;
	}
	function setIdCcoordenador($novoIdCcoordenador){
		$this->idCoordenador = $novoIdCoordenador;
	}	
}
?>