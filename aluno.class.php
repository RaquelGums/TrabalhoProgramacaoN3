<?php
	include_once 'usuario.class.php';
	include_once 'projeto.class.php';
	
	class Aluno extends Usuario{
		private $matricula;
		
		function __construct($id, $nome, $email, $senha, $ativo, $matricula) {
			$this->matricula = $matricula;
			parent::__construct($id, $nome, $email, $senha, $ativo);
		}	
		
		function salvar(){		
			$db = new PDO('mysql:host=localhost;dbname=db.ifrs;charset=utf8','root',''); 
			
			if ($this->getId()==0){
			    $r=$db->prepare("INSERT INTO usuario(nome, email, senha, tipo, ativo, matricula ) 
			    					VALUES  (:nome, :email, :senha, :tipo, :ativo, :matricula )"); //:nome e demais são variáveis do comando SQL - começam com :
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
		
		public static function recuperarSenha ($email, $matricula){
			$db = new PDO('mysql:host=localhost;dbname=db.ifrs;charset=utf8','root',''); 
			//  faz uma pesquisa na tabela de usuarios
			$r=$db->prepare("SELECT id FROM usuario WHERE email=:email and matricula=:matricula and tipo=1"); //prepara o comando 
			$r->execute(array(':email'=>$email,':matricula'=>$matricula)); //substitui as variaveis (:) do comando e executa
			$linhas=$r->fetchAll(PDO::FETCH_NUM); //fetchAll só existe nos comandos select; $linhas é um array com o resultado da consulta
			
			if(!empty($linhas)){
				$novaSenha="";                        //variavel
				for ($i=0; $i<6; $i++){
					$numero = mt_rand(1, 9);
					$novaSenha = $novaSenha.$numero;
				}
				$db = new PDO('mysql:host=localhost;dbname=db.ifrs;charset=utf8','root','');
				$r=$db->prepare("UPDATE usuario SET senha=:senha where id=:id"); 
				$r->execute(array(':senha'=>$novaSenha,
								':id'=>$linhas[0][0]));			
				return "Nova senha:".$novaSenha;
			}
			else {
				return "Não foram encontratos alunos com os dados informados.";
			}
		}
				
		public static function getAlunosMenosCoordenador ($id){
			$db = new PDO('mysql:host=localhost;dbname=db.ifrs;charset=utf8','root','');
			$r=$db->prepare("SELECT id, nome FROM usuario WHERE id!=:id and ativo=1 and Tipo=1");
			$r->execute(array(':id'=>$id));
			$linhas=$r->fetchAll(PDO::FETCH_NUM);
			
			$array = array();
			for($i=0; $i < count($linhas) ; $i++){
				//                  $id           ,$nome         ,$email ,$senha ,$ativo ,$matricula
				$aluno = new Aluno ($linhas[$i][0],$linhas[$i][1],""     ,0      ,1      ,"");
				$array[$i]=$aluno; 
			}
			return $array;
			
		}
		
		function getMatricula(){
			return $this->matricula;
		}				
		function setMatricula($matricula){
			$this->matricula = $matricula;
		}
	}
?>