<?php
include_once '../../ctrl/ClienteDAO.php';
+extract($_POST);
$dao = new ClienteDAO;
$dao = $dao->pesquisarValorTelentrega($idCliente);
$result = mysql_fetch_array($dao);
$valor = $result['teleEntrega'];
?>
<tr id="valTele">
    <td> Tele Entrega </td>
    <td> <?php echo str_replace(".", ",", $valor); ?></td>
    <td></td>
</tr>
