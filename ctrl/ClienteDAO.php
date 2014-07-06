<?php

include_once 'conexao.php';
include_once '../../model/Cliente.php';

/**
 * Description of ClienteDAO
 *
 * @author DouglasMachry
 */
class ClienteDAO extends Cliente {

    public function inserir(Cliente $cliente) {
        $telefones = $cliente->getTelefone();
        $insert = mysql_query("INSERT INTO clientes (nome,rg,cpf,idMunicipio,idBairro,endereco,observacoes) "
                . "VALUES ('" . $cliente->getNome() . "',"
                . "'" . $cliente->getRg() . "',"
                . "'" . $cliente->getCpf() . "',"
                . "'" . $cliente->getIdMunicipio() . "',"
                . "'" . $cliente->getIdBairro() . "',"
                . "'" . $cliente->getEndereco() . "',"
                . "'" . $cliente->getObservacoes() . "')");
        $idCliente = mysql_insert_id();

        if (!$insert) {
            return false;
        }
        foreach ($telefones as $tel) {
            $inserir = mysql_query("INSERT INTO telefones (idCliente, telefone)"
                    . "VALUES ('" . $idCliente . "','" . $tel . "')");
            if (!$inserir) {
                return false;
            }
        }
    }

    public function editar(Cliente $cliente) {
        $telefones = $cliente->getTelefone();
        $quantTel = count($telefones);
        $idTelefones = array();

        $update = mysql_query("UPDATE clientes SET " .
                "nome = '" . $cliente->getNome() . "', " .
                "rg = '" . $cliente->getRg() . "', " .
                "cpf = '" . $cliente->getCpf() . "', " .
                "idMunicipio = '" . $cliente->getIdMunicipio() . "', " .
                "idBairro = '" . $cliente->getIdBairro() . "', " .
                "endereco = '" . $cliente->getEndereco() . "', " .
                "observacoes = '" . $cliente->getObservacoes() . "' " .
                "WHERE id = '" . $cliente->getId() . "'");
        if (!$update) {
            echo mysql_error();
        }
        $idCliente = $cliente->getId();
        $telefonesAntigos = mysql_query("SELECT * FROM telefones WHERE idCliente = '" . $idCliente . "'");
        $quantTelAntigos = mysql_num_rows($telefonesAntigos);
        while ($row = mysql_fetch_array($telefonesAntigos)) {
            $idTelefones[] = $row['id'];
        }

        if ($quantTel == $quantTelAntigos) {
            foreach ($telefones as $tel) {
                $update = mysql_query("UPDATE telefones SET telefone = '" . $tel . "'"
                        . " WHERE id = '" . $idTelefones[$i] . "'");
                if (!$update) {
                    echo mysql_error();
                }
            }
        } elseif ($quantTel < $quantTelAntigos) {
            for ($i = 0; $i <= $quantTelAntigos; $i++) {
                if ($i <= $quantTel){
                    $update = mysql_query("UPDATE telefones SET telefone = '" . $tel . "'"
                            . " WHERE id = '" . $idTelefones[$i] . "'");
                    if (!$update) {
                        echo mysql_error();
                    }
                } else {
                    $delete = mysql_query("DELETE FROM telefones WHERE id = '" . $idTelefones[$i] . "'");
                    if (!$delete) {
                        echo mysql_error();
                    }
                }
            }
        }
    }

    public function remover(Cliente $cliente) {

        $remove = mysql_query("DELETE FROM clientes WHERE id = " . $cliente->getId());
        if (!$remove) {
            echo mysql_error();
        }
        $remove = mysql_query("DELETE FROM telefones WHERE idCliente = '" . $cliente->getId() . "'");
        if (!$remove) {
            echo mysql_error();
        }
    }

    public function pesquisarElementoPorId($id) {
        $pesquisa = mysql_query("SELECT clientes.id,clientes.nome,clientes.rg,"
                . "clientes.cpf,clientes.idMunicipio,clientes.idBairro,"
                . "clientes.endereco,COUNT(telefones.telefone) AS numTel,GROUP_CONCAT(telefones.telefone SEPARATOR '/') AS tel,clientes.observacoes FROM clientes "
                . "JOIN telefones ON telefones.idCliente = clientes.id WHERE clientes.id = '" . $id . "'");

        return $pesquisa;
    }
    
    public function gerarRelatorio($nomeFiltro, $filtro, $grupo) {
        if($nomeFiltro != "")
            $where = "WHERE c.".$nomeFiltro." LIKE '%".$filtro."%'";
        else
            $where = "";
        if($grupo != "")
            $group = " GROUP BY c.".$grupo;
        else
            $group = "";
        
        $pesquisa = mysql_query("SELECT c.*,m.nome AS nomeMunicipio, b.nome AS nomeBairro "
                . "FROM clientes c JOIN municipios m ON m.id = c.idMunicipio"
                . "JOIN bairros b ON b.id = c.idBairro ".$where.$group);
        if(!$pesquisa){
            echo mysql_error();
        }
        return $pesquisa;
    }
    
    public function pesquisarElementoPorNome($nome){
        $pesquisa = mysql_query("SELECT id, nome, endereco FROM clientes WHERE nome LIKE '%".$nome."%'");
        return $pesquisa;
    }
    
    public function pesquisarValorTelentrega($id){
        $pesquisa = mysql_query("SELECT bairros.teleEntrega FROM clientes JOIN bairros ON bairros.id = clientes.idBairro
                        WHERE clientes.id = '".$id."'");
        return $pesquisa;
    }


    public function pesquisarElementoPorCpf($cpf){
        $pesquisa = mysql_query("SELECT id, nome, endereco FROM clientes WHERE cpf = '".$cpf."'");
        return $pesquisa;
    }
    
    public function pesquisarElementoPorRg($rg){
        $pesquisa = mysql_query("SELECT id, nome, endereco FROM clientes WHERE rg = '".$rg."'");
        return $pesquisa;
    }

    public function listarTodos() {
        $clientes = array();
        $pesquisa = mysql_query("SELECT * FROM clientes ORDER BY nome");
        while ($linha = mysql_fetch_array($pesquisa)) {
            $cliente = new Cliente;
            $cliente->setId($linha['id']);
            $cliente->setNome($linha['nome']);
            $cliente->setRg($linha['rg']);
            $cliente->setCpf($linha['cpf']);
            $cliente->setIdMunicipio($linha['idMunicipio']);
            $cliente->setIdBairro($linha['idBairro']);
            $cliente->setEndereco($linha['endereco']);
            $cliente->setObservacoes($linha['observacoes']);
            $clientes[] = $cliente;
        }
        return $clientes;
    }

}

?>