<?php
include_once 'projeto.class.php';

	class ProjetoComunidade extends Projeto{
		private $publicoAlvo;
		
		function __construct($id, $titulo, $resumo, $tecnologiasUtilizadas, $idStatus, $duracao, $idCategoria, $publicoAlvo, $idCoordenador) {
			$this-> publicoAlvo = $publicoAlvo;
			parent::__construct($id, $titulo, $resumo, $tecnologiasUtilizadas, $idStatus, $duracao, $idCategoria, $idCoordenador);
			}
		
		function salvar(){		
			$db = new PDO('mysql:host=localhost;dbname=db.ifrs;charset=utf8','root',''); 
			
			if ($this->getId()==0){
			    $r=$db->prepare("INSERT INTO projeto(titulo, resumo, tecnologiasUtilizadas, idStatus, duracao, idCategoria, publicoAlvo, idCoordenador) 
			    					VALUES  (:titulo, :resumo, :tecnologiasUtilizadas, :idStatus, :duracao, :idCategoria, :publicoAlvo, :idCoordenador )");
		        $r->execute(array(':titulo'=>$this->getTitulo(),
			                      ':resumo'=>$this->getResumo(),
			    				  ':tecnologiasUtilizadas'=>$this->getTecnologiasUtilizadas(),
			    				  ':idStatus'=>$this->getIdStatus(),
			    				  ':duracao'=>$this->getDuracao(),
			    				  ':idCategoria'=>3,
								  ':publicoAlvo'=>$this->getPublicoAlvo(),
								  ':idCoordenador'=>$this->getIdCoordenador()));
			    				  
			    $this->setId($db->lastInsertId());
			}
			else {
				$r=$db->prepare("UPDATE projeto SET titulo=:titulo, resumo=:resumo, tecnologiasUtilizadas=:tecnologiasUtilizadas, idStatus=:idStatus, duracao=:duracao, idCategoria=:idCategoria, publicoAlvo=:publicoAlvo where id=:id"); 
		        $r->execute(array(':titulo'=>$this->getTitulo(),
			                      ':resumo'=>$this->getResumo(),
			    				  ':tecnologiasUtilizadas'=>$this->getTecnologiasUtilizadas(),
			    				  ':idStatus'=>$this->getStatus()->getId(),
			    				  ':duracao'=>$this->getDuracao(),
			    				  ':idCategoria'=>3,
								  ':publicoAlvo'=>$this->getPublicoAlvo(),
								  ':id'=>$this->getId()));
			}
		}
		function getPublicoAlvo(){
			return $this->publicoAlvo;
		}
		function setPublicoAlvo($novoPublicoAlvo){
			$this->publicoAlvo = $novoPublicoAlvo;
		}
	}
?>