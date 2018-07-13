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
		//tabela concurso  0id 	1titulo 	2descricao 	3dataInscricaoInicial 	4dataInscricaoFinal 	5idCategoria 	6dataPremiacao 	7descricaoPremiacao 	8tipoAvaliacao 	9ativo 	10projetoVencedor
		function __construct($id,$titulo,$resumo,$tecnologiasUtilizadas,$idStatus,$duracao,$idCategoria,$publicoAlvo,$departamentoAfetado,$resultadoEsperado,$areaAtuacao) {
			$this-> id = $id;
			$this-> titulo = $titulo;
			$this-> resumo = $resumo;
			$this-> tecnologiasUtilizadas = $tecnologiasUtilizadas;
			$this-> status = new Status($idStatus);
			$this-> duracao = $duracao;
			$this-> categoria = new Categoria($idCategoria);
			$this-> coordenador = Usuario::getUsuarioById($idCoordenador);
			
			$db = new PDO('mysql:host=localhost;dbname=db.ifrs;charset=utf8','root',''); //conexao com banco		
			$this->carregaComentarios($db);
			$this->carregaEquipe($db);
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