<?php
    include_once 'usuario.class.php';
	class Professor extends Usuario{
		private $siape;
		
		function __construct($id, $nome, $email, $senha, $ativo, $siape) {
			$this->siape = $siape;
			parent::__construct($id, $nome, $email, $senha, $ativo);
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
		
		public static function recuperarSenha ($email, $siape){
			$db = new PDO('mysql:host=localhost;dbname=db.ifrs;charset=utf8','root',''); 
			//  faz uma pesquisa na tabela de usuarios
			$r=$db->prepare("SELECT id FROM usuario WHERE email=:email and siape=:siape and tipo=2"); //prepara o comando 
			$r->execute(array(':email'=>$email,':siape'=>$siape)); //substitui as variaveis (:) do comando e executa
			$linhas=$r->fetchAll(PDO::FETCH_NUM); //fetchAll só existe nos comandos select; $linhas é um array com o resultado da consulta
			
			if(!empty($linhas)){
				$novaSenha="";                        //variavel
				for ($i=0; $i<6; $i++){
					$numero = mt_rand(1, 9);
					$novaSenha = $novaSenha.$numero;
				}
				$db = new PDO('mysql:host=localhost;dbname=db.ifrs;charset=utf8','root','root');
				$r=$db->prepare("UPDATE usuario SET senha=:senha where id=:id"); 
				$r->execute(array(':senha'=>$novaSenha,
								':id'=>$linhas[0][0]));			
				return "Nova senha:".$novaSenha;
			}
			else {
				return "Não foram encontratos professores com os dados preenchidos.";
			}
		}
		
		function getSiape(){
			return $this->siape;
		}				
		function setSiape($siape){
			$this->siape = $siape;
		}
	}
?>