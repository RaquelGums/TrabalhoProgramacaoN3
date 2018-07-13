<?php

class Coordenador extends Usuario {
    function __construct($id, $nome, $email, $senha, $ativo) {
        parent::__construct($id, $nome, $email, $senha, $ativo);
    }	
}