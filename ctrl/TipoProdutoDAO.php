<?php

include_once 'conexao.php';
include_once '../../model/TipoProduto.php';
/**
 * Description of TipoProdutoDAO
 *
 * @author DouglasMachry
 */
class TipoProdutoDAO extends TipoProduto{
        
    public function inserir(TipoProduto $tipoProduto){
        $insert = mysql_query("INSERT INTO tipoproduto (nome) VALUES ('".$tipoProduto->getNome()."')");
        if(!$insert){
            echo "N&atilde;o foi poss&iacute;vel inserir o registro no banco de dados. ".  mysql_error();
        }
    }
    
    public function editar(TipoProduto $tipoProduto){
        $update = mysql_query("UPDATE tipoproduto SET ".
                                "nome = '".$tipoProduto->getNome()."'".
                                "WHERE id = '".$tipoProduto->getId()."'");
        if(!$update){
            echo "N&atilde;o foi poss&iacute;vel atualizar o registro.";
        }
    }
    
    public function remover(TipoProduto $tipoProduto){
        $remove = mysql_query("DELETE FROM tipoproduto WHERE id = '".$tipoProduto->getId()."'");
        if(!$remove){
            echo "N&atilde;o foi poss&iacute;vel remover o registro. ".mysql_error();
        }
    }
    
    public function pesquisarElementoPorId($id){
        $pesquisa = mysql_query("SELECT * FROM tipoprodutos WHERE id = '".$id."'");
        return $pesquisa;
    }
    
    public function listarTodos(){
        $tipoProdutos = array();
        $pesquisa = mysql_query("SELECT * FROM tipoproduto ORDER BY nome");
        while ($linha = mysql_fetch_array($pesquisa)){
            $tipoProduto =  new TipoProduto;
            $tipoProduto->setId($linha['id']);
            $tipoProduto->setNome($linha['nome']);
            $tipoProdutos[] = $tipoProduto;
        }
        return $tipoProdutos;
    }
}
