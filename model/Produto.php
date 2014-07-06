<?php
/**
 * Description of Produto
 *
 * @author DouglasMachry
 */
class Produto {
    private $id;
    private $nome;
    private $tipoProduto;
    private $quantidade;
    private $medida;
    private $preco;
    
    function __construct() {
        
    }
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getTipoProduto() {
        return $this->tipoProduto;
    }

    public function getQuantidade() {
        return $this->quantidade;
    }

    public function getMedida() {
        return $this->medida;
    }

    public function getPreco() {
        return $this->preco;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setTipoProduto($tipoProduto) {
        $this->tipoProduto = $tipoProduto;
    }

    public function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }

    public function setMedida($medida) {
        $this->medida = $medida;
    }

    public function setPreco($preco) {
        $this->preco = $preco;
    }






}
