<?php
    include_once '../../ctrl/pedidoDAO.php';
    $dao = new PedidoDAO();
    if($_POST){
        +extract($_POST);
        $dao->cancelaPedido($idPedido,$motivo);
    }   
    $dao = $dao->pesquisarElementosEmAberto();
?>
<h2>Pedidos em aberto</h2>
<div class="colEsquerda">
    <label id="msg"> </label>
    <table class="pedidosAbertos">
    <tr class="titulos">
        
        <td>
            Data
        </td>
        <td>
            Cliente
        </td>
        <td>
            Status Atual
        </td>
        
    </tr>
    <?php
    while ($row = mysql_fetch_array($dao)){
        
        echo "<tr pedido ='".$row['id']."' class='pedido'>"
                . "<td>".date("d/m/Y", strtotime($row['dataHora']))."</td>"
                . "<td>".$row['nomeCliente']."</td>"
                . "<td>".$row['status']."</td>"
            . "</tr>";
    }
    ?>
</table>
</div>
<div id="cancelarPedido"></div>



