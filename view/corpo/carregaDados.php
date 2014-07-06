<?php

//echo "<script>alert('teste');</script>";
+extract($_POST);
require_once '../../ctrl/conexao.php';
require_once '../../ctrl/' . $form . 'DAO.php';
require_once '../../model/' . $form . '.php';
$retorno = "";
$dao = $form . 'DAO';
$dao = (object) new $dao();
$dado = $dao->pesquisarElementoPorId($cod);

$result = mysql_fetch_assoc($dado);
array_shift($result);

foreach ($result as $r) {
    $retorno .= $r . "/";
}

echo $retorno;
?>
