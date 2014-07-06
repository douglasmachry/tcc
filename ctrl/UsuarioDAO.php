<?php

include_once 'conexao.php';
@include_once 'model/Usuario.php';
@include_once '../../model/Usuario.php';

/**
 * Description of UsuarioDAO
 *
 * @author DouglasMachry
 */
class UsuarioDAO extends Usuario {

    public function inserir(Usuario $usuario) {
         $insert = mysql_query("INSERT INTO usuarios (nome,usuario, senha, perfil, idMunicipio, idBairro, endereco, rg, cpf) "
                . "VALUES ('".$usuario->getNome()."',"
                . "'".$usuario->getUsuario()."',"
                 . "'".$usuario->getSenha()."',"
                 . "'".$usuario->getPerfil()."',"
                 . "'".$usuario->getIdMunicipio()."',"
                 . "'".$usuario->getIdBairro()."',"
                 . "'".$usuario->getEndereco()."',"
                 . "'".$usuario->getRg()."',"
                . "'".$usuario->getCpf()."')");
        if(!$insert){
            echo "N&atilde;o foi poss&iacute;vel inserir o registro no banco de dados. ".  mysql_error();
        }
    }

    public function editar(Usuario $usuario) {
       $update = mysql_query("UPDATE usuarios SET ".
                                "nome = '".$usuario->getNome()."',".
                                "usuario = '".$usuario->getUsuario()."',".
                                "senha = '".$usuario->getSenha()."',".
                                "perfil = '".$usuario->getPerfil()."',".
                                "idMunicipio = '".$usuario->getIdMunicipio()."',".
                                "idBairro = '".$usuario->getIdBairro()."',".
                                "endereco = '".$usuario->getEndereco()."',".
                                "rg = '".$usuario->getRg()."',".
                                "cpf = '".$usuario->getCpf()."' ".
                                "WHERE id = '".$usuario->getId()."'");
        if(!$update){
            echo "N&atilde;o foi poss&iacute;vel atualizar o registro.".  mysql_error();
        }
    }

    public function remover(Usuario $usuario){
        $remove = mysql_query("DELETE FROM usuarios WHERE id = '".$usuario->getId()."'");
        if(!$remove){
            echo "Não foi possível remover o registro. ".mysql_error();
        }
    }
    
    public function pesquisarElementoPorId($id){
        $pesquisa = mysql_query("SELECT id, nome, usuario, rg, cpf, perfil, "
                . "idMunicipio, idBairro, endereco, senha "
                . "FROM usuarios WHERE id = '".$id."'");
        return $pesquisa;
    }
    
    public function listarTodos(){
        $usuarios = array();
        $pesquisa = mysql_query("SELECT * FROM usuarios ORDER BY nome");
        while ($linha = mysql_fetch_array($pesquisa)){
            $usuario =  new Usuario;
            $usuario->setId($linha['id']);
            $usuario->setNome($linha['nome']);
            $usuario->setUsuario($linha['usuario']);
            $usuario->setPerfil($linha['perfil']);
            $usuario->setSenha($linha['senha']);
            $usuario->setIdMunicipio($linha['idMunicipio']);
            $usuario->setIdBairro($linha['idBairro']);
            $usuario->setEndereco($linha['endereco']);
            $usuario->setRg($linha['rg']);
            $usuario->setCpf($linha['cpf']);
            
            $usuarios[] = $usuario;
        }
        return $usuarios;
    }

    public function login($user, $pass) {
        $pesquisa = mysql_query("SELECT * FROM usuarios "
                . "WHERE usuario = '".$user."' AND senha = '".$pass."'");
        
        if(!$pesquisa){
            echo mysql_error();
            return false;
        }
        return $pesquisa;
        
    }

}
