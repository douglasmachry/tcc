<?php
    include_once '../../ctrl/ClienteDAO.php';
    +extract($_POST);
    $dao = new ClienteDAO();
    $campoPesquisa = "pesquisarElementoPor".$campo;
    $pesquisa = $dao->$campoPesquisa($dado);
    if(mysql_num_rows($pesquisa) == 0){
        echo "<label class='msgerro'>Cliente n&atilde;o encontrado</label>";
    }else{
?>

<table class="dados">
    <tr class="titulos">
        <td>Nome</td>
        <td>Endere&ccedil;o</td>
    </tr>
    <?php
    while ($cliente = mysql_fetch_array($pesquisa)){
        echo "<tr id='cl".$cliente['id']."' class='cliente'>".
                "<td>".$cliente['nome']."</td>".
                "<td>".$cliente['endereco']."</td>".
             "</tr>";
    }
    
    ?>
</table><br />

<button id="novoPedido" class="submit">Novo Pedido</button>
<?php
    }
?>

