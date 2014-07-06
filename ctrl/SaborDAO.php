<?php

include_once 'conexao.php';
include_once '../../model/Sabor.php';
/**
 * Description of SaborDAO
 *
 * @author DouglasMachry
 */
class SaborDAO extends Sabor{
    public function inserir(Sabor $sabor){
        $insert = mysql_query("INSERT INTO sabores (idTipoSabor,nome) "
                . "VALUES ('".$sabor->getTipoSabor()."','".$sabor->getNome()."')");
        if(!$insert){
            echo "N&atilde;o foi poss&iacute;vel inserir o registro no banco de dados. ".  mysql_error();
        }
    }
    
    public function editar(Sabor $sabor){
        $update = mysql_query("UPDATE sabores SET ".
                                "idTipoSabor = '".$sabor->getTipoSabor()."',".
                                "nome = '".$sabor->getNome()."' ".
                                "WHERE id = '".$sabor->getId()."'");
        if(!$update){
            echo "N&atilde;o foi poss&iacute;vel atualizar o registro.";
        }
    }
    
    public function remover(Sabor $sabor){
        $remove = mysql_query("DELETE FROM sabores WHERE id = ".$sabor->getId());
        if(!$remove){
            echo "N&atilde;o foi poss&iacute;vel remover o registro. ".mysql_error();
        }
    }
    
    public function pesquisarElementoPorId($id){
        $pesquisa = mysql_query("SELECT * FROM sabores WHERE id = '".$id."'");
        return $pesquisa;
    }
    
    public function listarTodos(){
        $sabores = array();
        $pesquisa = mysql_query("SELECT * FROM sabores");
        while ($linha = mysql_fetch_array($pesquisa)){
            $sabor =  new Sabor;
            $sabor->setId($linha['id']);
            $sabor->setTipoSabor($linha['idTipoSabor']);
            $sabor->setNome($linha['nome']);
            $sabores[] = $sabor;
        }
        return $sabores;
    }
}

?>