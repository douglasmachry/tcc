<?php

include_once 'conexao.php';
include_once '../../model/Produto.php';
/**
 * Description of ProdutoDAO
 *
 * @author DouglasMachry
 */
class ProdutoDAO extends Produto{
        
    public function inserir(Produto $produto){
        $insert = mysql_query("INSERT INTO produtos (nome,tipoProduto,quantidade,medida,preco) "
                            . "VALUES ('".$produto->getNome()."',"
                                    . "'".$produto->getTipoProduto()."',"
                                    . "'".$produto->getQuantidade()."',"
                                    . "'".$produto->getMedida()."',"
                                    . "REPLACE('".$produto->getPreco()."',',','.'))");
        if(!$insert){
            echo "Não foi possível inserir o registro no banco de dados. ".  mysql_error();
        }
    }
    
    public function editar(Produto $produto){
        $update = mysql_query("UPDATE produtos SET ".
                                "nome = '".$produto->getNome()."',".
                                "tipoProduto = '".$produto->getTipoProduto()."',".
                                "quantidade = '".$produto->getQuantidade()."',".
                                "medida = '".$produto->getMedida()."',".
                                "preco = REPLACE('".$produto->getPreco()."',',','.') ". 
                                "WHERE id = '".$produto->getId()."'");
        if(!$update){
            echo "Não foi possível atualizar o registro.";
        }
    }
    
    public function remover(Produto $produto){
        $remove = mysql_query("DELETE FROM produtos WHERE id = '".$produto->getId()."'");
        if(!$remove){
            echo "Não foi possível remover o registro. ".mysql_error();
        }
    }
    
    public function pesquisarElementoPorId($id){
        $pesquisa = mysql_query("SELECT * FROM produtos WHERE id = '".$id."'");
        return $pesquisa;
    }
    
    public function pesquisarElementoPorTipo($tipo){
        $pesquisa = mysql_query("SELECT * FROM produtos WHERE tipoProduto = '".$tipo."'");
        return $pesquisa;
    }
    
    public function listarTodos(){
        $produtos = array();
        $pesquisa = mysql_query("SELECT * FROM produtos ORDER BY nome");
        while ($linha = mysql_fetch_array($pesquisa)){
            $produto =  new Produto;
            $produto->setId($linha['id']);
            $produto->setNome($linha['nome']);
            $produto->setTipoProduto($linha['tipoProduto']);
            $produto->setQuantidade($linha['quantidade']);
            $produto->setMedida($linha['medida']);
            $produto->setPreco(str_replace(".", ",",$linha['preco']));
            $produtos[] = $produto;
        }
        return $produtos;
    }
}
