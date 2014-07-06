<?php

include_once 'conexao.php';
include_once '../../model/Pedido.php';

/**
 * Description of PedidoDAO
 *
 * @author DouglasMachry
 */
class PedidoDAO extends Pedido {

    public function inserir(Pedido $pedido) {
        #$receitaDAO = new ReceitaDAO();
        $dataHora = date("Y-m-d H:i:s");
        $insert = mysql_query("INSERT INTO pedidos (idCliente,"
                . "telentrega,motoboy,valorTotal) "
                . "VALUES ('" . $pedido->getIdCliente() . "',"
                . "'" . $pedido->getTelentrega() . "',"
                . "'" . $pedido->getMotoboy() . "',"
                . "REPLACE('".$pedido->getValorTotal()."',',','.'))");
        if ($insert) {


            $tamanhos = $pedido->getTamanhos();
            $obsPizza = $pedido->getObsPizza();
            $produtos = $pedido->getProdutos();
            $obsProdutos = $pedido->getObsProdutos();

            $i = 0;

            $idPedido = mysql_insert_id();



            if (is_array($tamanhos)) {
                foreach ($tamanhos as $tamanho) {
                    $insertPedidoPizza = mysql_query("INSERT INTO pedidopizza (idPedido,idTamanho,observacoes)"
                            . "VALUES ('" . $idPedido . "','" . $tamanho . "','" . $obsPizza[$i] . "')");


                    if ($insertPedidoPizza) {
                        $idPedidoPizza = mysql_insert_id();
                        $sabores = $pedido->getSabores();
                        $sabor = $sabores[$i];

                        foreach ($sabor as $s) {
                            $insertPedidoSabor = mysql_query("INSERT INTO pedidosabor (idPedidoPizza,idSabores)"
                                    . "VALUES ('" . $idPedidoPizza . "','" . $s . "')");
                            if (!$insertPedidoSabor) {
                                echo mysql_error();
                                return false;
                            }
                        }
                    } else {
                        echo mysql_error();
                    }
                    $i++;
                }
            }

            $i = 0;
            if (is_array($produtos)) {
                foreach ($produtos as $produto) {
                    $insertPedidoProduto = mysql_query("INSERT INTO pedidoproduto(idPedido,idProduto,observacoes)"
                            . "VALUES ('" . $idPedido . "','" . $produto . "','" . $obsProdutos[$i] . "')");
                    if (!$insertPedidoProduto) {
                        echo mysql_error();
                    }
                    $i++;
                }
            }

            $insertStatus = mysql_query("INSERT INTO statuspedido (idPedido,status,dataHora)"
                    . "VALUES ('" . $idPedido . "','" . $pedido->getStatus() . "','" . $dataHora . "')");
            if (!$insertStatus) {
                echo mysql_error();
            }
        } else {
            echo "N&atilde;o foi poss&iacute;vel inserir o registro no banco de dados. " . mysql_error();
        }
    }

    public function editar(Pedido $pedido) {
        $update = mysql_query("UPDATE pedidos SET " .
                "nome = '" . $pedido->getNome() . "'" .
                "WHERE id = '" . $pedido->getId() . "'");
        if (!$update) {
            echo "N&atilde;o foi poss&iacute;vel atualizar o registro.";
        }
    }
    
    public function mudarStatus($idPedido,$status) {
        $update = mysql_query("UPDATE statuspedido SET status = '".$status."'"
                . "WHERE idPedido = '".$idPedido."'");
        if(!$update){
            echo mysql_error();
        }
    }
    
    public function cancelaPedido($idPedido,$motivo) {
        $update = mysql_query("UPDATE statuspedido SET status = 'cancelado'"
                . "WHERE idPedido = '".$idPedido."'");
        if(!$update){
            echo mysql_error();
        }else{
            $update = mysql_query("UPDATE pedidos SET motivoCancelamento = '".$motivo."'"
                    . "WHERE id = '".$idPedido."'");
            if(!$update){
                echo mysql_error();
            }
        }
    }

    public function remover(Pedido $pedido) {
        $remove = mysql_query("DELETE FROM pedidos WHERE id = " . $pedido->getId());
        if (!$remove) {
            echo "N&atilde;o foi poss&iacute;vel remover o registro. " . mysql_error();
        }
    }

    public function pesquisarElementoPorId($id) {
        $pesquisa = mysql_query("SELECT * FROM pedidos WHERE id = '" . $id . "'");
        return $pesquisa;
    }

    public function pesquisarElementosEmAberto() {
        $pesquisa = mysql_query("SELECT p.id, sp.status, sp.dataHora, c.nome AS nomeCliente FROM pedidos p
                JOIN statuspedido sp ON sp.idPedido = p.id
                JOIN clientes c ON c.id = p.idCliente
                WHERE sp.status NOT IN ('finalizado','cancelado')
                ORDER BY sp.dataHora");
        return $pesquisa;
    }

    public function listarTodos() {
        $pedidos = array();
        $pesquisa = mysql_query("SELECT * FROM pedidos");
        while ($linha = mysql_fetch_array($pesquisa)) {
            $pedido = new Pedido;
            $pedido->setId($linha['id']);
            $pedido->setNome($linha['nome']);
            $pedido->setMunicipio($linha['municipio']);
            $pedido->setTeleEntrega($linha['teleEntrega']);
            $pedidos[] = $pedido;
        }
        return $pedidos;
    }

}

?>