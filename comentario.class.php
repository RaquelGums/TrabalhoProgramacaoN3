<?php

include_once 'projeto.class.php';
include_once 'usuario.class.php';

class Comentario {
	private $id;
	private $idProjeto;
	private $descricao;
	private $data;
	private $usuario;
	private $respostas;
	
	function __construct ($id, $idProjeto, $descricao, $data, $idUsuario){
		$this-> id = $id;
		$this-> idProjeto = $idProjeto;
		$this-> descricao = $descricao;
		$this-> data = $data;
		$this-> usuario = Usuario::getUsuarioById($idUsuario);
		
		
		$db = new PDO('mysql:host=localhost;dbname=db.ifrs;charset=utf8','root','');
		$r=$db->prepare("SELECT id, idProjeto, descricao, data, idUsuario, idComentarioPai FROM comentario WHERE idComentarioPai=:id");
		$r->execute(array(':id'=>$id));
		$linhas=$r->fetchAll(PDO::FETCH_NUM);//fetchAll só existe nos comandos select; $linhas é um array com o resultado da consulta
		
		$this->respostas = array(); //o this vai ser usado para acessar atributos e metodos da classe, dentro do arquivo da classe
		for($i=0; $i < count($linhas) ; $i++){
			//                            $id,           $idProjeto,    $descricao,    $data,                       $idUsuario
			$resposta = new Comentario ($linhas[$i][0],$linhas[$i][1],$linhas[$i][2],new DateTime($linhas[$i][3]),$linhas[$i][4]);
			$this->respostas[$i]=$resposta;
		}
		
	}
	function salvar(){		
		$db = new PDO('mysql:host=localhost;dbname=db.ifrs;charset=utf8','root','');
		if ($this->getId()==0){
			$r=$db->prepare("INSERT INTO comentario(id, idProjeto, descricao, data, idUsuario) 
								VALUES  (:id, :idProjeto, :descricao, :data, :idUsuario)");
			$r->execute(array(':id'=>$this->getId(),
							':idProjeto'=>$this->getIdProjeto(),
							':descricao'=>$this->getDescricao(),
							':data'=>$this->getData(),
							':idUsuario'=>$this->getUsuario()->getId()));
							
			$this->setId($db->lastInsertId());
		}
		else {
			$r=$db->prepare("UPDATE comentario SET descricao=:descricao where id=:id"); 
			$r->execute(array(':id'=>$this->getId(),':descricao'=>$this->getDescricao()));
		}
	}
	
		function getId(){
			return $this->id;
		}
		function setId($novoId){
			$this->id = $novoId;
		}
		function getIdProjeto(){
			return $this->idProjeto;
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
		function getUsuario(){
			return $this->usuario;
		}
		function setUsuario($usuario){
			$this->usuario = $usuario;
		} 	
	public function getRespostas()
	{
		return $this->respostas;
	}
	public function setRespostas($respostas)
	{
		$this->respostas = $respostas;
	}
}
?>