<?php	
	class Usuario{
		private $id;
		private $nome;
		private $email;
		private $senha;
		private $ativo; //atributo
		
		function __construct($id, $nome, $email, $senha, $ativo) { //metodo construtor, onde $id e demais são parametros
			$this->id = $id;
		    $this->nome=$nome;
		    $this->email=$email;
		    $this->senha=$senha;
		    $this->ativo=$ativo;
		}	
	    function setId($id){
			$this->id = $id;
		}	
		function getId(){
			return $this->id;
		}				
		function getNome(){
			return $this->nome;
		}
		function setNome($novo_nome){
			$this->nome = $novo_nome;
		}				
		function getEmail(){
			return $this->email;
		}
		function setEmail($novo_email){
			$this->email = $novo_email;
		}
		function getSenha(){
			return $this->senha;
		}
		function setSenha($novo_senha){
			$this->senha = $novo_senha;
		}				
		function getTipoUsuario(){
			return $this->tipoUsuario;
		}			
		function getAtivo(){
			return $this->ativo;
		}
		function setAtivo($altera_ativo){
			$this->ativo = $altera_ativo;
		}
		
		function alterarSenha($senha, $novaSenha, $novaSenha1){	
			
			if($senha==$this->senha){
				if($novaSenha==$novaSenha1){
					if($senha!=$novaSenha){
						$db = new PDO('mysql:host=localhost;dbname=db.ifrs;charset=utf8','root','');
						$r=$db->prepare("UPDATE usuario SET senha=:senha where id=:id"); 
						$r->execute(array(':senha'=>$novaSenha,
										':id'=>$this->getId()));
						$this->setSenha($novaSenha);
						return "Alterado com sucesso.";
					}
					return "A nova senha não pode ser igual a senha atual.";
				}
				return "A nova senha não coincide com a confirmação.";
			}
			return "Senha atual incorreta";
		}
	}
?>