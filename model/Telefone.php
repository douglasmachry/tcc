<?php

 /* Description of Telefone
 *
 * @author DouglasMachry
 */
class Telefone {
    private $id;
    private $idCliente;
    private $telefone;
    
    function __construct() {
        
    }
    
    public function getId() {
        return $this->id;
    }

    public function getIdCliente() {
        return $this->idCliente;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setIdCliente($idCliente) {
        $this->idCliente = $idCliente;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }



}
