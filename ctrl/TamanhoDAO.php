<?php

include_once 'conexao.php';
include_once '../../model/Tamanho.php';
/**
 * Description of TamanhoDAO
 *
 * @author DouglasMachry
 */
class TamanhoDAO extends Tamanho{
    public function inserir(Tamanho $tamanho){
        $insert = mysql_query("INSERT INTO tamanhos (nome,quantSabores) "
                . "VALUES ('".$tamanho->getNome()."',"
                . "'".$tamanho->getQuantSabores()."')");
        if(!$insert){
            return false;
        }
    }
    
    public function editar(Tamanho $tamanho){
        $update = mysql_query("UPDATE tamanhos SET ".
                                "nome = '".$tamanho->getNome()."',"
                                . "quanSabores = '".$tamanho->getQuantSabores()."'".
                                " WHERE id = '".$tamanho->getId()."'");
        if(!$update){
            return false;
        }
    }
    
    public function remover(Tamanho $tamanho){
        $remove = mysql_query("DELETE FROM tamanhos WHERE id = ".$tamanho->getId());
        if(!$remove){
            echo "N&atilde;o foi poss&iacute;vel remover o registro. ".mysql_error();
        }
    }
    
    public function pesquisarElementoPorId($id){
        $pesquisa = mysql_query("SELECT * FROM tamanhos WHERE id = '".$id."'");
        return $pesquisa;
    }
    
    public function listarTodos(){
        $tamanhos = array();
        $pesquisa = mysql_query("SELECT * FROM tamanhos");
        while ($linha = mysql_fetch_array($pesquisa)){
            $tamanho =  new Tamanho;
            $tamanho->setId($linha['id']);
            $tamanho->setNome($linha['nome']);
            $tamanho->setQuantSabores($linha['quantSabores']);
            $tamanhos[] = $tamanho;
        }
        return $tamanhos;
    }
}

?>