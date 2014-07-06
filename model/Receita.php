<?php
/**
 * Description of Receita
 *
 * @author DouglasMachry
 */
class Receita {
    private $id;
    private $nome;
    private $idSabor;
    private $idTamanho;
    private $idProduto;
    private $quantidade;
    private $medida;
    
    function __construct() {
        
    }
    
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getIdSabor() {
        return $this->idSabor;
    }

    public function getIdTamanho() {
        return $this->idTamanho;
    }

    public function getIdProduto() {
        return $this->idProduto;
    }

    public function getQuantidade() {
        return $this->quantidade;
    }

    public function getMedida() {
        return $this->medida;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setIdSabor($idSabor) {
        $this->idSabor = $idSabor;
    }

    public function setIdTamanho($idTamanho) {
        $this->idTamanho = $idTamanho;
    }

    public function setIdProduto($idProduto) {
        $this->idProduto = $idProduto;
    }

    public function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }

    public function setMedida($medida) {
        $this->medida = $medida;
    }

}
