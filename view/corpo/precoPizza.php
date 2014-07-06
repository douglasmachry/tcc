<?php

+extract($_POST);
include_once '../../ctrl/TipoSaborDAO.php';
include_once '../../ctrl/PrecoDAO.php';
$dao = new PrecoDAO();
$tipoSabor = new TipoSaborDAO();
$precos = array();
$nomes = array();
foreach ($idSabor as $sabor) {
    $sabor = explode("_", $sabor);
    $tpSabor = $tipoSabor->pesquisarElementoPorId($sabor[0]);
    $result = mysql_fetch_array($tpSabor);
    $tipo = $result['nome'];
    $nome = $tipo . " " . $nomeTamanho;
    //echo $nome;
    $valor = $dao->pesquisarElementoPorNome($nome);
    $precos[] = $valor;
    $nomes[] = $nome;
 }

$precoFinal = max($precos);
$keyNome = array_keys($precos,$precoFinal);
#echo $keyNome[0];
echo "Pre&ccedil;o (R$): <input type='text' id='precoFinal' value='" . str_replace(".", ",", $precoFinal) . "' readonly />".
        "<input type='hidden' id='nomeTipoSabor' value='".$nomes[$keyNome[0]]."' />";
?>
    

