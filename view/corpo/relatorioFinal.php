<?php
    include_once '../../ctrl/ClienteDAO.php';
    +extract($_POST);
    if(!isset($filtro))
        $filtro = "";
    
    if(!isset($grupo))
        $grupo = "";
    $dao = new ClienteDAO();
    $dao = $dao->gerarRelatorio($nomeFiltro, $filtro, $grupo);
    
 ?>
<table class="dados">
    <tr>
        <td>Nome</td>
        <td>Munic&iacute;pio</td>
        <td>Bairro</td>
    </tr>
    <?php
        while ($linha = mysql_fetch_array($dao)){
            echo "<tr>"
                    . "<td>".$linha['nome']."</td>"
                    . "<td>".$linha['nomeMunicipio']."</td>"
                    . "<td>".$linha['nomeBairro']."</td>"
                . "</tr>";
        }
    
    ?>
</table>