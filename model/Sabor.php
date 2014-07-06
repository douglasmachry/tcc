<?php

/**
 * Description of Sabor
 *
 * @author DouglasMachry
 */
class Sabor {
    private $id;
    private $nome;
    private $tipoSabor;
    
    function __construct() {
       
    }
    
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getTipoSabor() {
        return $this->tipoSabor;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setTipoSabor($tipoSabor) {
        $this->tipoSabor = $tipoSabor;
    }



}
