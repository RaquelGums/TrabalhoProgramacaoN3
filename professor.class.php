<?php
    include_once 'usuario.class.php';
	class Professor extends Usuario{
		private $siape;
		
		function __construct($id, $nome, $email, $senha, $ativo, $siape) {
			$this->siape = $siape;
			parent::__construct($id, $nome, $email, $senha, $ativo);
		}
		function getSiape(){
			return $this->siape;
		}				
		function setSiape($siape){
			$this->siape = $siape;
		}
		
		function salvar(){		
			$db = new PDO('mysql:host=localhost;dbname=db.ifrs;charset=utf8','root',''); 
			
			if ($this->getId()==0){
			    $r=$db->prepare("INSERT INTO usuario(nome, email, senha, tipo, ativo, siape ) 
			    					VALUES  (:nome, :email, :senha, :tipo, :ativo, :siape )");
		        $r->execute(array(':nome'=>$this->getNome(),
			                      ':email'=>$this->getEmail(),
			    				  ':senha'=>$this->getSenha(),
			    				  ':tipo'=>2,
			    				  ':ativo'=>1,
			    				  ':siape'=>$this->getSiape()));
			    				  
			    $this->setId($db->lastInsertId());
			}
			else {
				$r=$db->prepare("UPDATE usuario SET nome=:nome, email=:email, senha=:senha, siape=:siape where id=:id"); 
		        $r->execute(array(':nome'=>$this->getNome(),
			                      ':email'=>$this->getEmail(),
			    				  ':senha'=>$this->getSenha(),
			    				  ':siape'=>$this->getSiape(),
								  ':id'=>$this->getId()));
			}
		}
	}
?>