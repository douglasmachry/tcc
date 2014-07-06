<?php
    include_once '../../ctrl/pedidoDAO.php';
    $dao = new PedidoDAO();
    if($_POST){
        +extract($_POST);
        $dao->mudarStatus($idPedido, $status);
    }   
    $dao = $dao->pesquisarElementosEmAberto();
?>
<h2>Pedidos em aberto</h2>
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
        <td>
            Mudar Status Para
        </td>
    </tr>
    <?php
    while ($row = mysql_fetch_array($dao)){
       
        echo "<tr>"
                . "<td>".date("d/m/Y", strtotime($row['dataHora']))."</td>"
                . "<td>".$row['nomeCliente']."</td>"
                . "<td>".$row['status']."</td>"
                . "<td><select id='novoStatus'>"
                        . "<option value='aberto'>aberto</option>"
                        . "<option value='producao'>produ&ccedil;&atilde;o</option>"
                        . "<option value='entregando'>entregando</option>"
                        . "<option value='entregue'>entregue</option>"
                        . "<option value='finalizado'>finalizado</option>"
                    . "</select>"
                    . "<button id='mudarStatus' pedido = '".$row['id']."'>Mudar Status</button>&nbsp;"
                    . "<button id='finalizarPedido' class='submit' pedido = '".$row['id']."'>Finalizar</button>"
                . "</td>"
            . "</tr>";
    }
    ?>
</table>


