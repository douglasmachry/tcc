<?php

include_once 'conexao.php';
include_once '../../model/TipoSabor.php';
/**
 * Description of TipoSaborDAO
 *
 * @author DouglasMachry
 */
class TipoSaborDAO extends TipoSabor{
        
    public function inserir(TipoSabor $tipoSabor){
        $insert = mysql_query("INSERT INTO tiposabores (nome) VALUES ('".$tipoSabor->getNome()."')");
        if(!$insert){
            echo "N&atilde;o foi poss&iacute;vel inserir o registro no banco de dados. ".  mysql_error();
        }
    }
    
    public function editar(TipoSabor $tipoSabor){
        $update = mysql_query("UPDATE tiposabores SET ".
                                "nome = '".$tipoSabor->getNome()."'".
                                "WHERE id = '".$tipoSabor->getId()."'");
        if(!$update){
            echo "N&atilde;o foi poss&iacute;vel atualizar o registro.";
        }
    }
    
    public function remover(TipoSabor $tipoSabor){
        $remove = mysql_query("DELETE FROM tiposabores WHERE id = '".$tipoSabor->getId()."'");
        if(!$remove){
            echo "N&atilde;o foi poss&iacute;vel remover o registro. ".mysql_error();
        }
    }
    
    public function pesquisarElementoPorId($id){
        $pesquisa = mysql_query("SELECT * FROM tiposabores WHERE id = '".$id."'");
        return $pesquisa;
    }
    
    public function listarTodos(){
        $tiposabores = array();
        $pesquisa = mysql_query("SELECT * FROM tiposabores ORDER BY nome");
        while ($linha = mysql_fetch_array($pesquisa)){
            $tipoSabor =  new TipoSabor;
            $tipoSabor->setId($linha['id']);
            $tipoSabor->setNome($linha['nome']);
            $tiposabores[] = $tipoSabor;
        }
        return $tiposabores;
    }
}
