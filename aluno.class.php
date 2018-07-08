<?php
	include_once 'usuario.class.php';
	
	class Aluno extends Usuario{
		private $matricula;
		
		function __construct($id, $nome, $email, $senha, $ativo, $matricula) {
			$this->matricula = $matricula;
			parent::__construct($id, $nome, $email, $senha, $ativo);
		}	
		
		function getMatricula(){
			return $this->matricula;
		}				
		function setMatricula($matricula){
			$this->matricula = $matricula;
		}
		
		function salvar(){		
			$db = new PDO('mysql:host=localhost;dbname=db.ifrs;charset=utf8','root',''); 
			
			if ($this->getId()==0){
			    $r=$db->prepare("INSERT INTO usuario(nome, email, senha, tipo, ativo, matricula ) 
			    					VALUES  (:nome, :email, :senha, :tipo, :ativo, :matricula )");
		        $r->execute(array(':nome'=>$this->getNome(),
			                      ':email'=>$this->getEmail(),
			    				  ':senha'=>$this->getSenha(),
			    				  ':tipo'=>1,
			    				  ':ativo'=>1,
			    				  ':matricula'=>$this->getMatricula()));
			    				  
			    $this->setId($db->lastInsertId());
			}
			else {
				$r=$db->prepare("UPDATE usuario SET nome=:nome, email=:email, senha=:senha, matricula=:matricula where id=:id"); 
		        $r->execute(array(':nome'=>$this->getNome(),
			                      ':email'=>$this->getEmail(),
			    				  ':senha'=>$this->getSenha(),
			    				  ':matricula'=>$this->getMatricula(),
								  ':id'=>$this->getId()));
			}
		}
	}
?>