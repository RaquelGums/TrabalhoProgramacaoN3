<?php

include_once 'projeto.class.php';
include_once 'usuario.class.php';

class Comentario {
	private $id;
	private $idProjeto;
	private $descricao;
	private $data;
	private $idUsuario;
	
	function __construct ($id, $idProjeto, $descricao, $data, $idUsuario){
		$this-> id = $id;
		$this-> idProjeto = $idProjeto;
		$this-> descricao = $descricao;
		$this-> data = $data;
		$this-> idUsuario = $idUsuario;
		
		$db = new PDO('mysql:host=localhost;dbname=db.ifrs;charset=utf8','root','');
		$r=$db->prepare("SELECT id, descricao FROM comentario WHERE id=:id");
		$r->execute(array(':id'=>$id));
		$linhas=$r->fetchAll(PDO::FETCH_NUM);//fetchAll só existe nos comandos select; $linhas é um array com o resultado da consulta
		
		if(!empty($linhas)){
			$this->id = $linhas[0][0]; //seto o atributo id com o resultado da consulta no banco
			$this->descricao = $linhas[0][1]; //seto o atributo descrição com o resultado da consulta no banco
		}
		
		function salvar(){		
		$db = new PDO('mysql:host=localhost;dbname=db.ifrs;charset=utf8','root','');
			if ($this->getId()==0){
				$r=$db->prepare("INSERT INTO comentario(id, idProjeto, descricao, data, idUsuario) 
									VALUES  (:id, :idProjeto, :descricao, :data, :idUsuario)");
				$r->execute(array(':id'=>$this->getId(),
								':idProjeto'=>$this->getProjeto()->getId(),
								':descricao'=>$this->getDescricao(),
								':data'=>$this->getData(),
								':idUsuario'=>$this->getUsuario()->getId()));
								
				$this->setId($db->lastInsertId());
			}
			else {
				$r=$db->prepare("UPDATE comentario SET id=:id, idProjeto=:idProjeto, descricao=:descricao, data=:data, idUsuario=:idUsuario"); 
				$r->execute(array(':id'=>$this->getTitulo(),
								':idProjeto'=>$this->getProjeto()->getId(),
								':descricao'=>$this->getDescricao(),
								':data'=>$this->getData(),
								':idUsuario'=>$this->getUsuario()->getId()));
			}
		}
	}
	
	function getId(){
		return $this->id;
	}
	function setId($novoId){
		$this->id = $novoId;
	}
	function getIdProjeto(){
		return $this->projeto;
	}
	function setIdProjeto($alteraIdProjeto){
		$this->idProjeto = $alteraIdProjeto;
	}
	function getDescricao(){
		return $this->descricao;
	}
	function setDescricao($alteraDescricao){
		$this->descricao = $alteraDescricao;
	} 
	function getData(){
		return $this->data;
	}
	function setData($alteraData){
		$this->data = $alteraData;
	} 
	function getIdUsuario(){
		return $this->usuario;
	}
	function setIdUsuario($alteraIdUsuario){
		$this->idUsuario = $alteraIdUsuario;
	} 	
}
?>