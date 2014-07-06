<?php

include_once 'conexao.php';
include_once '../../model/Receita.php';

/**
 * Description of ReceitaDAO
 *
 * @author DouglasMachry
 */
class ReceitaDAO extends Receita{
    public function inserir(Receita $receita){
        $receitasProntas = $this->pesquisarElementoPorNomeEProduto($receita->getNome(),$receita->getIdProduto());
        if(mysql_num_rows($receitasProntas) > 0){
            
            $receita = $this->igualarMedidas($receita, $receitasProntas);
            if($receita != false)
                $this->editar($receita);
            return;
        }
        $insert = mysql_query("INSERT INTO receitas (nome,sabor,tamanho,idProduto,quantidade,medida) "
        . "VALUES ('".$receita->getNome()."',"
        . "'".$receita->getIdSabor()."',"
        . "'".$receita->getIdTamanho()."',"
        . "'".$receita->getIdProduto()."',"
        . "'".$receita->getQuantidade()."',"
        . "'".$receita->getMedida()."')");
        if(!$insert){
            echo "N&atilde;o foi poss&iacute;vel inserir o registro no banco de dados. ".  mysql_error();
        }
    }
    
    public function editar(Receita $receita){
        
        
        $update = mysql_query("UPDATE receitas SET ".
                                "nome = '".$receita->getNome()."',".
                                "sabor = '".$receita->getIdSabor()."',".
                                "tamanho = '".$receita->getIdTamanho()."',".
                                "idProduto = '".$receita->getIdProduto()."',".
                                "quantidade = '".$receita->getQuantidade()."',".
                                "medida = '".$receita->getMedida()."'".
                                "WHERE id = '".$receita->getId()."'");
        if(!$update){
            echo "N&atilde;o foi poss&iacute;vel atualizar o registro.";
        }
    }
    
    public function remover(Receita $receita){
        $remove = mysql_query("DELETE FROM receitas WHERE id = ".$receita->getId());
        if(!$remove){
            echo "N&atilde;o foi poss&iacute;vel remover o registro. ".mysql_error();
        }
    }
    
    public function pesquisarElementoPorNome ($nome){
        $pesquisa = mysql_query("SELECT receitas.*, "
                                            . "produtos.nome AS nomeProduto "
                                            . "FROM receitas JOIN produtos "
                                            . "ON receitas.idProduto = produtos.id "
                                            . "WHERE receitas.nome = '".$nome."'");
        if($pesquisa){
            return $pesquisa;
        }else{
            echo "Receita não localizada. ".mysql_error();
        }
    }
    
    public function igualarMedidas($receita, $receitasProntas){
        $row = mysql_fetch_array($receitasProntas);
        $receita->setId($row["id"]);
        if($row["idProduto"] == $receita->getIdProduto()){
            if($row["medida"] == $receita->getMedida()){
                $receita->setQuantidade($receita->getQuantidade() + $row["quantidade"]);
            }else{
                if($row["medida"] == "kg" && $receita->getMedida() == "g"){
                    $receita->setQuantidade($row["quantidade"] + ($receita->getQuantidade()/1000));
                    $receita->setMedida("kg");
                }elseif($row["medida"] == "g" && $receita->getMedida() == "kg"){
                    $receita->setQuantidade(($row["quantidade"]/1000) + $receita->getQuantidade());
                    $receita->setMedida("kg");
                }else{
                    echo "N&atilde;o foi poss&iacute;vel somar unidades com outras medidas, selecione outra unidade de medida";
                    return false;
                }
            }
        }  
        return $receita;
    }
    
    public function pesquisarElementoPorNomeEProduto($nome, $idProduto){
        $pesquisa = mysql_query("SELECT * FROM receitas WHERE nome = '".$nome."' AND idProduto = '".$idProduto."'");
        if($pesquisa){
            return $pesquisa;
        }else{
            echo "Receita não localizada. ".mysql_error();
        }
    }
    
    public function pesquisarElementoPorTamanhoESabor($tamanho,$sabor){
        $pesquisa = mysql_query("SELECT * FROM receitas WHERE tamanho = '".$tamanho."' AND sabor = '".$sabor."'");
        if($pesquisa){
            return $pesquisa;
        }else{
            echo "Receita não localizada. ".mysql_error();
        }
    }


    public function pesquisarElementoPorId($id){
        $pesquisa = mysql_query("SELECT * FROM receitas WHERE id = '".$id."'");
        return $pesquisa;
    }
    
    public function listarTodos(){
        $receitas = array();
        $pesquisa = mysql_query("SELECT * FROM receitas GROUP BY nome ORDER BY nome");
        while ($linha = mysql_fetch_array($pesquisa)){
            $receita =  new Receita;
            $receita->setId($linha['id']);
            $receita->setNome($linha['nome']);
            $receita->setIdSabor($linha['sabor']);
            $receita->setIdTamanho($linha['tamanho']);
            $receita->setIdProduto($linha['idProduto']);
            $receita->setQuantidade($linha['quantidade']);
            $receita->setMedida($linha['medida']);
            $receitas[] = $receita;
        }
        return $receitas;
    }
}

?>