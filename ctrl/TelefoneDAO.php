<?php

include_once 'conexao.php';
include_once '../../model/Telefone.php';
/**
 * Description of TelefoneDAO
 *
 * @author DouglasMachry
 */
class TelefoneDAO extends Telefone{
    public function inserir(Telefone $telefone){
        $insert = mysql_query("INSERT INTO telefones (idCliente, telefone) "
                . "VALUES ('".$telefone->getIdCliente()."',"
                . "'".$telefone->getTelefone()."')");
        if(!$insert){
            echo "N&atilde;o foi poss&iacute;vel inserir o registro no banco de dados. ".  mysql_error();
            return false;
        }
    }
    
    public function editar(Telefone $telefone){
        $update = mysql_query("UPDATE telefones SET ".
                                "telefone = '".$telefone->getTelefone()."'".
                                "WHERE id = '".$telefone->getId()."'");
        if(!$update){
            echo "N&atilde;o foi poss&iacute;vel atualizar o registro.";
        }
    }
    
    public function remover(Telefone $telefone){
        $remove = mysql_query("DELETE FROM telefones WHERE id = ".$telefone->getId());
        if(!$remove){
            echo "N&atilde;o foi poss&iacute;vel remover o registro. ".mysql_error();
        }
    }
    public function pesquisarElementoPorCliente($idCliente){
        $pesquisa = mysql_query("SELECT * FROM telefones WHERE idCliente = '".$idCliente."'");
        return $pesquisa;
    }

    public function pesquisarElementoPorId($id){
        $pesquisa = mysql_query("SELECT * FROM telefones WHERE id = '".$id."'");
        return $pesquisa;
    }
    
    public function listarTodos(){
        $telefones = array();
        $pesquisa = mysql_query("SELECT * FROM telefones");
        while ($linha = mysql_fetch_array($pesquisa)){
            $telefone =  new Telefone;
            $telefone->setId($linha['id']);
            $telefone->setNome($linha['nome']);
            $telefone->setMunicipio($linha['municipio']);
            $telefone->setTeleEntrega($linha['teleEntrega']);
            $telefones[] = $telefone;
        }
        return $telefones;
    }
}

?>