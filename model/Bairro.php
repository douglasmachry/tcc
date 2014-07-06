<?php

/**
 * Description of Bairro
 *
 * @author DouglasMachry
 */
class Bairro {
    private $id;
    private $nome;
    private $municipio;
    private $teleEntrega;
    
    function __construct() {
        
    }
    
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getMunicipio() {
        return $this->municipio;
    }

    public function getTeleEntrega() {
        return $this->teleEntrega;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setMunicipio($municipio) {
        $this->municipio = $municipio;
    }

    public function setTeleEntrega($teleEntrega) {
        $this->teleEntrega = $teleEntrega;
    }



    
}
