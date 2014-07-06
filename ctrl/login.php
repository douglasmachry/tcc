<?php
    require_once 'antiInjection.php';
    $usuario = antiInjection($_POST['usuario']);
    $senha = antiInjection($_POST['senha']);
    //echo "<script>alert('teste');</script>";
    //$consulta = mysql_query("SELECT * FROM usuarios WHERE usuario='$usuario' AND senha='$senha'") or die(mysql_error());
    require_once 'UsuarioDAO.php';
    $dao = new UsuarioDAO;
    $consulta = $dao->login($usuario, $senha);
    $num = mysql_num_rows($consulta);
    if ($num == 0) {
       
        echo "<label id='erroLogin'>Usu&aacute;rio e/ou senha inv&aacute;lido(s)!</label>";
        //header("Location: ./");
    } else {
        $result = mysql_fetch_array($consulta);
        $_SESSION['login'] = $result['usuario'];
        $_SESSION['perfil'] = $result['perfil'];
        $_SESSION['nome'] = $result['nome'];
        //echo "foi, meteu, passou";
        header("Location: ./");
    }
?>