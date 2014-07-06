<?php

/**
 * Description of Usuarios
 *
 * @author DouglasMachry
 */
class Usuario {
    private $id;
    private $nome;
    private $usuario;
    private $rg;
    private $cpf;
    private $perfil;
    private $idMunicipio;
    private $idBairro;
    private $endereco;
    private $senha;
    
    function __construct() {
        
    }
    
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getRg() {
        return $this->rg;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function getPerfil() {
        return $this->perfil;
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

    public function getSenha() {
        return $this->senha;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function setRg($rg) {
        $this->rg = $rg;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function setPerfil($perfil) {
        $this->perfil = $perfil;
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

    public function setSenha($senha) {
        $this->senha = $senha;
    }




}
