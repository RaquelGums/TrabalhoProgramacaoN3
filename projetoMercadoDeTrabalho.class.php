<?php

include_once 'projeto.class.php';
class ProjetoMercadoDeTrabalho extends Projeto{
	private $areaAtuacao;
	
	function __construct($id, $titulo, $resumo, $tecnologiasUtilizadas, $idStatus, $duracao, $idCategoria, $areaAtuacao, $idCoordenador) {
		$this-> areaAtuacao = $areaAtuacao;
		parent::__construct($id, $titulo, $resumo, $tecnologiasUtilizadas, $idStatus, $duracao, $idCategoria, $idCoordenador);
	}
	
	function salvar(){		
		$db = new PDO('mysql:host=localhost;dbname=db.ifrs;charset=utf8','root','root');
		if ($this->getId()==0){
		    $r=$db->prepare("INSERT INTO projeto(titulo, resumo, tecnologiasUtilizadas, idStatus, duracao, idCategoria, areaAtuacao, idCoordenador) 
		    					VALUES  (:titulo, :resumo, :tecnologiasUtilizadas, :idStatus, :duracao, :idCategoria, :areaAtuacao, :idCoordenador )");
	        $r->execute(array(':titulo'=>$this->getTitulo(),
		                      ':resumo'=>$this->getResumo(),
		    				  ':tecnologiasUtilizadas'=>$this->getTecnologiasUtilizadas(),
		    				  ':idStatus'=>$this->getStatus()->getId(),
		    				  ':duracao'=>$this->getDuracao(),
		    				  ':idCategoria'=>2,
							  ':areaAtuacao'=>$this->getAreaAtuacao(),
							  ':idCoordenador'=>$this->getCoordenador()->getId()));
		    				  
		    $this->setId($db->lastInsertId());
		}
		else {
			$r=$db->prepare("UPDATE projeto SET titulo=:titulo, resumo=:resumo, tecnologiasUtilizadas=:tecnologiasUtilizadas, idStatus=:idStatus, duracao=:duracao, idCategoria=:idCategoria, areaAtuacao=:areaAtuacao where id=:id"); 
	        $r->execute(array(':titulo'=>$this->getTitulo(),
		                      ':resumo'=>$this->getResumo(),
		    				  ':tecnologiasUtilizadas'=>$this->getTecnologiasUtilizadas(),
		    				  ':idStatus'=>$this->getIdStatus(),
		    				  ':duracao'=>$this->getDuracao(),
		    				  ':idCategoria'=>2,
							  ':areaAtuacao'=>$this->getAreaAtuacao(),
							  ':id'=>$this->getId()));
		}
		$this->salvaEquipe();
	}
	function getAreaAtuacao(){
		return $this->areaAtuacao;
	}
	function setAreaAtuacao($novaAreaAtuacao){
		$this->areaAtuacao = $novaAreaAtuacao;
	}	
}
?>