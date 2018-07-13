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
	private $idComentarioPai;
	
	function __construct ($id, $idProjeto, $descricao, $data, $idUsuario, $idComentarioPai){
		$this->id = $id;
		$this->idProjeto = $idProjeto;
		$this->descricao = $descricao;
		$this->data = $data;
		$this->usuario = Usuario::getUsuarioById($idUsuario);
		$this->idComentarioPai = $idComentarioPai;
		
		
		$db = new PDO('mysql:host=localhost;dbname=db.ifrs;charset=utf8','root','');
		$r=$db->prepare("SELECT id, idProjeto, descricao, data, idUsuario, idComentarioPai FROM comentario WHERE idComentarioPai=:id");
		$r->execute(array(':id'=>$id));
		$linhas=$r->fetchAll(PDO::FETCH_NUM);//fetchAll só existe nos comandos select; $linhas é um array com o resultado da consulta
		
		$this->respostas = array(); //o this vai ser usado para acessar atributos e metodos da classe, dentro do arquivo da classe
		for($i=0; $i < count($linhas) ; $i++){
			//                            $id,           $idProjeto,    $descricao,    $data,                       $idUsuario
			$resposta = new Comentario ($linhas[$i][0],$linhas[$i][1],$linhas[$i][2],new DateTime($linhas[$i][3]),$linhas[$i][4], $id);
			$this->respostas[$i]=$resposta;
		}
		
	}
	function salvar(){		
		$db = new PDO('mysql:host=localhost;dbname=db.ifrs;charset=utf8','root','');
		if ($this->getId()==0){
			$r=$db->prepare("INSERT INTO comentario(id, idProjeto, descricao, data, idUsuario, idComentarioPai) 
								VALUES  (:id, :idProjeto, :descricao, :data, :idUsuario, :idComentarioPai)");
			$r->execute(array(':id'=>$this->getId(),
							':idProjeto'=>$this->getIdProjeto(),
							':descricao'=>$this->getDescricao(),
							':data'=>$this->getData(),
							':idUsuario'=>$this->getUsuario()->getId(),							
							':idComentarioPai'=>$this->getIdComentarioPai()));
							
			$this->setId($db->lastInsertId());
		}
		else {
			$r=$db->prepare("UPDATE comentario SET descricao=:descricao, data=:data where id=:id"); 
			$r->execute(array(':id'=>$this->getId(),':descricao'=>$this->getDescricao(),':data'=>$this->getData()));
		}
		// for($i=0; $i < count($this->respostas) ; $i++){
		// 	$resposta = $this->respostas[$i];
		// 	$resposta->salvar();
		// }
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
	public function getIdComentarioPai()
	{
		return $this->idComentarioPai;
	}
	public function setIdComentarioPai($idComentarioPai)
	{
		$this->idComentarioPai = $idComentarioPai;
	}
}
?>