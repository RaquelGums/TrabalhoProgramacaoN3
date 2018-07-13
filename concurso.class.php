<?php
include_once 'comentario.class.php';
	class Concurso{
		private $id;
		private $titulo;
		private $descricao;
		private $dataInscricaoInicial;
		private $dataInscricaoFinal;
		private $categoria; 
		private $dataPremiacao; 
		private $descricaoPremiacao;
		private $tipoAvaliacao;
		private $ativo;
		private $projetoVencedor;	
		
		function __construct($id,$titulo,$descricao,$dataInscricaoInicial,$dataInscricaoFinal,$idCategoria,$dataPremiacao,
		$descricaoPremiacao,$tipoAvaliacao,$ativo,$projetoVencedor) {
			$this->$id= $id;
            $this->$titulo=$titulo;
            $this->$descricao=$descricao;
            $this->$dataInscricaoInicial=$dataInscricaoInicial;
            $this->$dataInscricaoFinal=$dataInscricaoFinal;
            //$this->$categoria=new Categoria($idCategoria);
            $this->$dataPremiacao=$dataPremiacao;
            $this->$descricaoPremiacao=$descricaoPremiacao;
            $this->$tipoAvaliacao=$tipoAvaliacao;
            $this->$ativo=$ativo;
            $this->$projetoVencedor=$projetoVencedor;
		}
		/**
		 * Get the value of id
		 */ 
		public function getId()
		{
				return $this->id;
		}

		/**
		 * Set the value of id
		 *
		 * @return  self
		 */ 
		public function setId($id)
		{
				$this->id = $id;
		}

		/**
		 * Get the value of titulo
		 */ 
		public function getTitulo()
		{
				return $this->titulo;
		}

		/**
		 * Set the value of titulo
		 *
		 * @return  self
		 */ 
		public function setTitulo($titulo)
		{
				$this->titulo = $titulo;

				return $this;
		}

		/**
		 * Get the value of dataInscricaoInicial
		 */ 
		public function getDataInscricaoInicial()
		{
				return $this->dataInscricaoInicial;
		}

		/**
		 * Set the value of dataInscricaoInicial
		 *
		 * @return  self
		 */ 
		public function setDataInscricaoInicial($dataInscricaoInicial)
		{
				$this->dataInscricaoInicial = $dataInscricaoInicial;

				return $this;
		}

		/**
		 * Get the value of dataInscricaoFinal
		 */ 
		public function getDataInscricaoFinal()
		{
				return $this->dataInscricaoFinal;
		}

		/**
		 * Set the value of dataInscricaoFinal
		 *
		 * @return  self
		 */ 
		public function setDataInscricaoFinal($dataInscricaoFinal)
		{
				$this->dataInscricaoFinal = $dataInscricaoFinal;

				return $this;
		}

		/**
		 * Get the value of dataPremiacao
		 */ 
		public function getDataPremiacao()
		{
				return $this->dataPremiacao;
		}

		/**
		 * Set the value of dataPremiacao
		 *
		 * @return  self
		 */ 
		public function setDataPremiacao($dataPremiacao)
		{
				$this->dataPremiacao = $dataPremiacao;

				return $this;
		}

		/**
		 * Get the value of descricaoPremiacao
		 */ 
		public function getDescricaoPremiacao()
		{
				return $this->descricaoPremiacao;
		}

		/**
		 * Set the value of descricaoPremiacao
		 *
		 * @return  self
		 */ 
		public function setDescricaoPremiacao($descricaoPremiacao)
		{
				$this->descricaoPremiacao = $descricaoPremiacao;

				return $this;
		}

		/**
		 * Get the value of tipoAvaliacao
		 */ 
		public function getTipoAvaliacao()
		{
				return $this->tipoAvaliacao;
		}

		/**
		 * Set the value of tipoAvaliacao
		 *
		 * @return  self
		 */ 
		public function setTipoAvaliacao($tipoAvaliacao)
		{
				$this->tipoAvaliacao = $tipoAvaliacao;

				return $this;
		}

		/**
		 * Get the value of ativo
		 */ 
		public function getAtivo()
		{
				return $this->ativo;
		}

		/**
		 * Set the value of ativo
		 *
		 * @return  self
		 */ 
		public function setAtivo($ativo)
		{
				$this->ativo = $ativo;

				return $this;
		}

		/**
		 * Get the value of projetoVencedor
		 */ 
		public function getProjetoVencedor()
		{
				return $this->projetoVencedor;
		}

		/**
		 * Set the value of projetoVencedor
		 *
		 * @return  self
		 */ 
		public function setProjetoVencedor($projetoVencedor)
		{
				$this->projetoVencedor = $projetoVencedor;

				return $this;
		}

		/**
		 * Get the value of categoria
		 */ 
		public function getCategoria()
		{
				return $this->categoria;
		}

		/**
		 * Set the value of categoria
		 *
		 * @return  self
		 */ 
		public function setCategoria($categoria)
		{
				$this->categoria = $categoria;

				return $this;
		}
	}
?>