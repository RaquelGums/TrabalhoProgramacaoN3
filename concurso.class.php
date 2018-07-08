<?php
	class Concurso{
		private $id;
		private $titulo;
		private $resumo;
		private $tecnologiasUtilizadas;
		private $idStatus;
		private $duracao;
		private $idCategoria;
		private $publicoAlvo;
		private $departamentoAfetado;
		private $resultadoEsperado;
		private $areaAtuacao;	
		
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
		function getSiape(){
			return $this->siape;
		}
		function setSiape($novo_siape){
			$this->siape = $novo_siape;
		}
		function getMatricula(){
			return $this->matricula;
		}
		function setMatricula($novo_matricula){
			$this->matricula = $novo_matricula;
		}	
	}
?>