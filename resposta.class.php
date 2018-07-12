<?php //rever todo este cadastro
include_once 'comentario.class.php';
include_once 'usuario.class.php';

class Resposta{
	private $id;
	private $comentario;
	private $descricao;
	private $usuario;
	private $data;
	
	function __construct ($id, $idComentario, $descricao, $idUsuario, $data){
		$this-> id = $id;
		$this-> comentario = new Comentario($idComentario);
		$this-> descricao = $descricao;
		$this-> usuario = new Usuario ($idUsuario);
		$this-> data = $data;	
		}
	}
	
	function salvar(){		
		$db = new PDO('mysql:host=localhost;dbname=db.ifrs;charset=utf8','root','root');
		if ($this->getId()==0){
		    $r=$db->prepare("INSERT INTO resposta(id, idComentario, descricao, idUsuario, data) 
		    					VALUES  (:id, :idComentario, :descricao, :idUsuario, :data)");
	        $r->execute(array(':id'=>$this->getId(),
		                      ':idComentario'=>$this->getComentario()->getId(),
		    				  ':descricao'=>$this->getDescricao(),
		    				  ':idUsuario'=>$this->getUsuario()->getId(),
							  ':data'=>$this->getData()));
		    				  
		    $this->setId($db->lastInsertId());
		}
		else {
			$r=$db->prepare("UPDATE resposta SET id=:id, idComentario=:idComentario, descricao=:descricao, idUsuario=:idUsuario, data=:data"); 
	        $r->execute(array(':id'=>$this->getTitulo(),
		                      ':idComentario'=>$this->getComentario()->getId(),
		    				  ':descricao'=>$this->getDescricao(),
		    				  ':idUsuario'=>$this->getUsuario()->getId(),
							  ':data'=>$this->getData()));
		}
	}
	
	function getId(){
		return $this->id;
	}
	function setId($novoId){
		$this->id = $novoId;
	}
	function getComentario(){
		return $this->comentario;
	}
	function setComentario($alteraComentario){
		$this->comentario = $alteraComentario;
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
	function setUsuario($alteraUsuario){
		$this->usuario = $alteraUsuario;
	} 
}
?>