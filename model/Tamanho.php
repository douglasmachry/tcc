<?php
/**
 * Description of Tamanho
 *
 * @author DouglasMachry
 */
class Tamanho {
    private $id;
    private $nome;
    private $quantSabores;
    
    function __construct() {
        
    }

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getQuantSabores() {
        return $this->quantSabores;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setQuantSabores($quantSabores) {
        $this->quantSabores = $quantSabores;
    }


}
