<?php
class Status{
	private $id;
	private $descricao;
	
	function __construct ($id){
		$db = new PDO('mysql:host=localhost;dbname=db.ifrs;charset=utf8','root','root');
		$r=$db->prepare("SELECT id, descricao FROM status WHERE id=:id");
		$r->execute(array(':id'=>$id));
		$linhas=$r->fetchAll(PDO::FETCH_NUM);//fetchAll só existe nos comandos select; $linhas é um array com o resultado da consulta
		
		
		if(!empty($linhas)){
			$this->id = $linhas[0][0]; //seto o atributo id com o resultado da consulta no banco
			$this->descricao = $linhas[0][1]; //seto o atributo descrição com o resultado da consulta no banco
		}
	}
	function getId(){
		return $this->id;
	}
	function setId($novoId){
		$this->id = $novoId;
	}
	function getDescricao(){
		return $this->descricao;
	}
	function setDescricao($novaDescricao){
		$this->descricao = $novaDescricao;
	}
}
?>