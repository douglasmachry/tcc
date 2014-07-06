<?php
+extract($_POST);
include_once '../../ctrl/ProdutoDAO.php';
$produtos = new ProdutoDAO();
$produtos = $produtos->pesquisarElementoPorTipo($tipo);

echo "<select id='produto'>";
while($produto = mysql_fetch_array($produtos)){
    echo "<option preco='".$produto['preco']."' value = '".$produto['id']."'>".
                $produto['nome'].
         "</option>";
}
echo "</select>";
?>