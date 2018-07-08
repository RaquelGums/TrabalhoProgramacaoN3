<?php

	class Projeto{
		private $id;
		private $titulo;
		private $resumo;
		private $tecnologiasUtilizadas;
		private $idStatus;
		private $duracao;
		private $idCategoria;
		private $idCoordenador;
		
		function __construct($id, $titulo, $resumo, $tecnologiasUtilizadas, $idStatus, $duracao, $idCategoria, $idCoordenador) {
			$this-> id = $id;
			$this-> titulo = $titulo;
			$this-> resumo = $resumo;
			$this-> tecnologiasUtilizadas = $tecnologiasUtilizadas;
			$this-> idStatus = $idStatus;
			$this-> duracao = $duracao;
			$this-> idCategoria = $idCategoria;
			$this-> idCoordenador = $idCoordenador;
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
		function getIdStatus(){
			return $this->idStatus;
		}
		function setIdStatus($alteraStatus){
			$this->status = $alteraStatus;
		}
		function getDuracao(){
			return $this->duracao;
		}
		function setDuracao($novaDuracao){
			$this->duracao = $novaDuracao;
		}
		function getIdCategoria(){
			return $this->idCategoria;
		}
		function setIdCategoria($novoIdCategoria){
			$this->idCategoria = $novoIdCategoria;
		}
		function getIdCoordenador(){
			return $this->idCoordenador;
		}
		function setIdCcoordenador($novoIdCcoordenador){
			$this->idCoordenador = $novoIdCoordenador;
		}	
	}
?>