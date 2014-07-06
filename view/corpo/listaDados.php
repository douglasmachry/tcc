
<?php
    
    require_once '../../ctrl/antiInjection.php';
    $obj = antiInjection($_POST['form']);
    require_once '../../ctrl/'. $obj . 'DAO.php';
    //echo "<script>alert('teste');</script>";
    $dao = $obj . "DAO";
    $dao = (object) new $dao();

    $consulta = $dao->listarTodos();
    if(count($consulta) > 0){
?>
<table class="dados">
    <tr class="titulos">
        <td>Nome</td>
        <td>Op&ccedil;&otilde;es</td>
    </tr>
<?php
    foreach ($consulta as $linha){
?>
    <tr>
        <td><?php echo $linha->getNome();?> </td>
        <td>
            <span class="editar" id="e<?php echo $linha->getId(); ?>">
                <img src="./view/img/icone_editar.png" />
            </span>
            <span class="remover" id="r<?php echo $linha->getId(); ?>">
                <img src="./view/img/remove.png" />
            </span>
        </td>
    </tr>
    <?php } ?>
</table>
<?php } 
    else {
     return false; 
    }
?>