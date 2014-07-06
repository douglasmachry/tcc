<?php

/**
 * Description of Pedido
 *
 * @author DouglasMachry
 */
class Pedido {
    private $id;
    private $idCliente;
    private $status;
    private $motivoCancelamento;
    private $telentrega;
    private $motoboy;
    private $valorTotal;
    private $tamanhos;
    private $sabores;
    private $obsPizza;
    private $produtos;
    private $obsProdutos;
            
    function __construct() {
        
    }

    public function getId() {
        return $this->id;
    }

    public function getIdCliente() {
        return $this->idCliente;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getMotivoCancelamento() {
        return $this->motivoCancelamento;
    }

    public function getTelentrega(){
        return $this->telentrega;
    }

    public function getMotoboy() {
        return $this->motoboy;
    }

    public function getValorTotal() {
        return $this->valorTotal;
    }

    public function getTamanhos() {
        return $this->tamanhos;
    }

    public function getSabores() {
        return $this->sabores;
    }

    public function getObsPizza() {
        return $this->obsPizza;
    }

    public function getProdutos() {
        return $this->produtos;
    }

    public function getObsProdutos() {
        return $this->obsProdutos;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setIdCliente($idCliente) {
        $this->idCliente = $idCliente;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function setMotivoCancelamento($motivoCancelamento) {
        $this->motivoCancelamento = $motivoCancelamento;
    }

    public function setMotoboy($motoboy) {
        $this->motoboy = $motoboy;
    }

    public function setTelentrega($telentrega) {
        $this->telentrega = $telentrega;
    }
    
    public function setValorTotal($valorTotal) {
        $this->valorTotal = $valorTotal;
    }

    public function setTamanhos($tamanhos) {
        $this->tamanhos = $tamanhos;
    }

    public function setSabores($sabores) {
        $this->sabores = $sabores;
    }

    public function setObsPizza($obsPizza) {
        $this->obsPizza = $obsPizza;
    }

    public function setProdutos($produtos) {
        $this->produtos = $produtos;
    }

    public function setObsProdutos($obsProdutos) {
        $this->obsProdutos = $obsProdutos;
    }




}
