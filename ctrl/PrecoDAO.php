<?php

include_once 'conexao.php';
include_once '../../model/Preco.php';
/**
 * Description of PrecoDAO
 *
 * @author DouglasMachry
 */
class PrecoDAO extends Preco{
        
    public function inserir(Preco $preco){
        $insert = mysql_query("INSERT INTO precos (nome, idTipoSabor, idTamanho, valor) "
                . "VALUES ('".$preco->getNome()."',"
                        . "'".$preco->getTipoSabor()."',"
                        . "'".$preco->getIdTamanho()."',"
                        . "REPLACE('".$preco->getValor()."',',','.'))");
                            
        if(!$insert){
            echo "N&atilde;o foi poss&iacute;vel inserir o registro no banco de dados. ".  mysql_error();
        }
    }
    
    public function editar(Preco $preco){
        $update = mysql_query("UPDATE precos SET ".
                                "nome = '".$preco->getNome()."', ".
                                "idTipoSabor = '".$preco->getTipoSabor()."', ".
                                "idTamanho = '".$preco->getIdTamanho()."', ".
                                "valor = REPLACE('".$preco->getValor()."',',','.')".
                                "WHERE id = '".$preco->getId()."'");
        if(!$update){
            echo "N&atilde;o foi poss&iacute;vel atualizar o registro.".  mysql_error();
        }
    }
    
    public function remover(Preco $preco){
        $remove = mysql_query("DELETE FROM precos WHERE id = '".$preco->getId()."'");
        if(!$remove){
            echo "N&atilde;o foi poss&iacute;vel remover o registro. ".mysql_error();
        }
    }
    
    public function pesquisarElementoPorId($id){
        $pesquisa = mysql_query("SELECT * FROM precos WHERE id = '".$id."'");
        return $pesquisa;
    }
    
    public function pesquisarElementoPorNome($nome){
        $pesquisa = mysql_query("SELECT valor FROM precos WHERE nome = '".$nome."'");
        if(mysql_num_rows($pesquisa) > 0){
            $r = mysql_fetch_array($pesquisa);
            $result = $r['valor'];
            return $result;  
        }else{
            $result = "Pre&ccedil;o n&atilde;o cadastrado";
            return $result;
        }
        
    }
    
    public function listarTodos(){
        $precos = array();
        $pesquisa = mysql_query("SELECT * FROM precos ORDER BY nome");
        while ($linha = mysql_fetch_array($pesquisa)){
            $preco =  new Preco;
            $preco->setId($linha['id']);
            $preco->setNome($linha['nome']);
            $precos[] = $preco;
        }
        return $precos;
    }
}
