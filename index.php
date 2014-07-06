<?php
session_start();

include "ctrl/conexao.php";
//Conexao::getInstance();
?>
<html>
    <head>
        <title> PizzAdmin - Administrador de Pizzarias </title>
        <link type="text/css" rel="stylesheet" href="view/css/style.css" />
        <link type="text/css" rel="stylesheet" href="view/css/validationEngine.jquery.css" />
        <script src="view/js/jquery.js" type="text/javascript"></script>
        <script src="view/js/jquery.validationEngine.js" type="text/javascript"></script>
        <script src="view/js/jquery.validationEngine-pt_BR.js" type="text/javascript"></script>
        <script src="view/js/jquery.maskMoney.js" type="text/javascript"></script>
        <script src="view/js/functions.js" type="text/javascript"></script>
        <script src="view/js/mascara.js" type="text/javascript"></script>
        <script src="view/js/validaCpf.js" type="text/javascript"></script>
      
    </head>
    <body>
        <div id="logo">
            <img src="view/img/logo.png" />
            <?php if (isset($_SESSION['login'])) { ?>
                <label id="bemvindo"> Bem vindo <nome><?php echo $_SESSION['nome']; ?></nome>! (<a href=".?a=sair">Sair</a>)</label>
            <?php } ?>
        </div>
        <div id="menu">
            <?php
            if (isset($_SESSION['login'])) {
                include "view/corpo/menu.php";
            }
            ?>
        </div>


        <?php
        if (!isset($_SESSION['login'])) {
            if(isset($_GET['a'])){
                //header ("Location: ./");
                if($_GET['a'] == "login"){
                    include "ctrl/login.php";
                }else{
                    $_GET['a'] = null;
                }
            }
            include "view/corpo/login.html";
            
        }
        
        if (isset($_GET['a']) && isset($_SESSION['login'])) {
            
            echo "<div id='corpo'>";
            switch ($_GET['a']) {
                case 'sair':
                    $_SESSION['login'] = null;
                    $_SESSION['nome'] = null;
                    $_SESSION['perfil'] = null;
                    header("Location:./");
                    break;
                case 'inicio':
                    include "view/corpo/inicio.html";
                    break;
                case 'gerenciamento':
                    include "view/corpo/gerenciamento.php";
                    break;
                case 'pedidos':
                    include "view/corpo/pedidos.html";
                    break;
                case 'relatorios':
                    include "view/corpo/relatorios.html";
                    break;
                case 'inserir':
                    include "ctrl/inserir.php";
                    break;
                case 'editar':
                    include "ctrl/editar.php";
                    break;
                case 'remover':
                    include "ctrl/remover.php";
                    break;
                default:
                    include "view/corpo/inicio.html";
                    break; 
            }
            
            echo "</div>";
        } else {
            if (isset($_SESSION['login'])) {
                echo "<div id='corpo'>";
                include "view/corpo/inicio.html";
                echo "</div>";
            }
                
            
        }
        ?>

    </body>
</html>