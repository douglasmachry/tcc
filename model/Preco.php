<?php
/**
 * Description of Precos
 *
 * @author DouglasMachry
 */
class Preco {
    private $id;
    private $nome;
    private $tipoSabor;
    private $idTamanho;
    private $valor;
    
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

    public function getIdTamanho() {
        return $this->idTamanho;
    }

    public function getValor() {
        return $this->valor;
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

    public function setIdTamanho($idTamanho) {
        $this->idTamanho = $idTamanho;
    }

    public function setValor($valor) {
        $this->valor = $valor;
    }





}
