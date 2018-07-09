<?php

include_once 'projeto.class.php';
	class ProjetoInstitucional extends Projeto{
		private $departamentoAfetado;
		private $resultadoEsperado;
		
		function __construct($id, $titulo, $resumo, $tecnologiasUtilizadas, $idStatus, $duracao, $idCategoria, $departamentoAfetado, $resultadoEsperado, $idCoordenador) {
			$this-> departamentoAfetado = $departamentoAfetado;
			$this-> resultadoEsperado = $resultadoEsperado;
			parent::__construct($id, $titulo, $resumo, $tecnologiasUtilizadas, $idStatus, $duracao, $idCategoria, $idCoordenador);
		}
		
		function salvar(){		
			$db = new PDO('mysql:host=localhost;dbname=db.ifrs;charset=utf8','root',''); 
			
			if ($this->getId()==0){
			    $r=$db->prepare("INSERT INTO projeto(titulo, resumo, tecnologiasUtilizadas, idStatus, duracao, idCategoria, departamentoAfetado, resultadoEsperado, idCoordenador) 
			    					VALUES  (:titulo, :resumo, :tecnologiasUtilizadas, :idStatus, :duracao, :idCategoria, :departamentoAfetado, :resultadoEsperado, :idCoordenador )");
		        $r->execute(array(':titulo'=>$this->getTitulo(),
			                      ':resumo'=>$this->getResumo(),
			    				  ':tecnologiasUtilizadas'=>$this->getTecnologiasUtilizadas(),
			    				  ':idStatus'=>$this->getIdStatus(),
			    				  ':duracao'=>$this->getDuracao(),
			    				  ':idCategoria'=>1,
								  ':departamentoAfetado'=>$this->getDepartamentoAfetado(),
								  ':resultadoEsperado'=>$this->getResultadoEsperado(),
								  ':idCoordenador'=>$this->getIdCoordenador()));
			    				  
			    $this->setId($db->lastInsertId());
			}
			else {
				$r=$db->prepare("UPDATE projeto SET titulo=:titulo
												  , resumo=:resumo
												  , tecnologiasUtilizadas=:tecnologiasUtilizadas
												  , idStatus=:idStatus
												  , duracao=:duracao
												  , idCategoria=:idCategoria
												  , departamentoAfetado=:departamentoAfetado
												  , resultadoEsperado=:resultadoEsperado 
												  where id=:id"); 
		        $r->execute(array(':titulo'=>$this->getTitulo(),
			                      ':resumo'=>$this->getResumo(),
			    				  ':tecnologiasUtilizadas'=>$this->getTecnologiasUtilizadas(),
			    				  ':idStatus'=>$this->getStatus()->getId(),
			    				  ':duracao'=>$this->getDuracao(),
			    				  ':idCategoria'=>1,
								  ':departamentoAfetado'=>$this->getDepartamentoAfetado(),
								  ':resultadoEsperado'=>$this->getResultadoEsperado(),
								  ':id'=>$this->getId()));
			}
		}
		function getDepartamentoAfetado(){
			return $this->departamentoAfetado;
		}
		function setDepartamentoAfetado($novoDepartamentoAfetado){
			$this->departamentoAfetado = $novoDepartamentoAfetado;
			}
		function getResultadoEsperado(){
			return $this->resultadoEsperado;
		}
		function setResultadoEsperado($novoResultadoEsperado){
			$this->resultadoEsperado = $ResultadoEsperado;
		}	
	}
?>