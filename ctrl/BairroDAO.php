<?php

include_once 'conexao.php';
include_once '../../model/Bairro.php';
/**
 * Description of BairroDAO
 *
 * @author DouglasMachry
 */
class BairroDAO extends Bairro{
    public function inserir(Bairro $bairro){
        $insert = mysql_query("INSERT INTO bairros (nome,municipio,teleEntrega) "
                . "VALUES ('".$bairro->getNome()."',"
                . "'".$bairro->getMunicipio()."',"
                . "'".$bairro->getTeleEntrega()."')");
        if(!$insert){
            echo "N&atilde;o foi poss&iacute;vel inserir o registro no banco de dados. ".  mysql_error();
        }
    }
    
    public function editar(Bairro $bairro){
        $update = mysql_query("UPDATE bairros SET ".
                                "nome = '".$bairro->getNome()."'".
                                "WHERE id = '".$bairro->getId()."'");
        if(!$update){
            echo "N&atilde;o foi poss&iacute;vel atualizar o registro.";
        }
    }
    
    public function remover(Bairro $bairro){
        $remove = mysql_query("DELETE FROM bairros WHERE id = ".$bairro->getId());
        if(!$remove){
            echo "N&atilde;o foi poss&iacute;vel remover o registro. ".mysql_error();
        }
    }
    
    public function pesquisarElementoPorId($id){
        $pesquisa = mysql_query("SELECT * FROM bairros WHERE id = '".$id."'");
        return $pesquisa;
    }
    
    public function listarTodos(){
        $bairros = array();
        $pesquisa = mysql_query("SELECT * FROM bairros");
        while ($linha = mysql_fetch_array($pesquisa)){
            $bairro =  new Bairro;
            $bairro->setId($linha['id']);
            $bairro->setNome($linha['nome']);
            $bairro->setMunicipio($linha['municipio']);
            $bairro->setTeleEntrega($linha['teleEntrega']);
            $bairros[] = $bairro;
        }
        return $bairros;
    }
}

?>