<?php


/**
 * Description of municipio
 *
 * @author DouglasMachry
 */
class Municipio {

    private $id;
    private $nome;

    function __construct() {
        
    }

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

}
