<?php

include_once 'conexao.php';
include_once '../../model/Municipio.php';
/**
 * Description of MunicipioDAO
 *
 * @author DouglasMachry
 */
class MunicipioDAO extends Municipio{
        
    public function inserir(Municipio $municipio){
        $insert = mysql_query("INSERT INTO municipios (nome) VALUES ('".$municipio->getNome()."')");
        if(!$insert){
            echo "Não foi possível inserir o registro no banco de dados. ".  mysql_error();
        }
    }
    
    public function editar(Municipio $municipio){
        $update = mysql_query("UPDATE municipios SET ".
                                "nome = '".$municipio->getNome()."'".
                                "WHERE id = '".$municipio->getId()."'");
        if(!$update){
            echo "Não foi possível atualizar o registro.";
        }
    }
    
    public function remover(Municipio $municipio){
        $remove = mysql_query("DELETE FROM municipios WHERE id = '".$municipio->getId()."'");
        if(!$remove){
            echo "Não foi possível remover o registro. ".mysql_error();
        }
    }
    
    public function pesquisarElementoPorId($id){
        $pesquisa = mysql_query("SELECT * FROM municipios WHERE id = '".$id."'");
        return $pesquisa;
    }
    
    public function listarTodos(){
        $municipios = array();
        $pesquisa = mysql_query("SELECT * FROM municipios ORDER BY nome");
        while ($linha = mysql_fetch_array($pesquisa)){
            $municipio =  new Municipio;
            $municipio->setId($linha['id']);
            $municipio->setNome($linha['nome']);
            $municipios[] = $municipio;
        }
        return $municipios;
    }
}
