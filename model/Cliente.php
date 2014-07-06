<?php

/**
 * Description of cliente
 *
 * @author DouglasMachry
 */
class Cliente {
    private $id;
    private $nome;
    private $rg;
    private $cpf;
    private $idMunicipio;
    private $idBairro;
    private $endereco;
    private $telefone;
    private $observacoes;
    
    function __construct() {
        
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function getNome() {
        return $this->nome;
    }

    public function getRg() {
        return $this->rg;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function getIdMunicipio() {
        return $this->idMunicipio;
    }

    public function getIdBairro() {
        return $this->idBairro;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function getObservacoes() {
        return $this->observacoes;
    }

    public function setId($id) {
        $this->id=$id;
    }
    
    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setRg($rg) {
        $this->rg = $rg;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function setIdMunicipio($idMunicipio) {
        $this->idMunicipio = $idMunicipio;
    }

    public function setIdBairro($idBairro) {
        $this->idBairro = $idBairro;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function setObservacoes($observacoes) {
        $this->observacoes = $observacoes;
    }


    
}
