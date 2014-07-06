<?php

+extract($_POST);
include_once '../../ctrl/SaborDAO.php';
include_once '../../ctrl/PrecoDAO.php';
$sabores = new SaborDAO();
$sabores = $sabores->listarTodos();
$preco = new PrecoDAO();


for ($i = 1; $i <= $quant; $i++) {
    if ($i <= 4) {
        echo "Sabor " . $i . ": <select name='sabor[]'>";
        foreach ($sabores as $sabor) {
            echo "<option value='".$sabor->getTipoSabor()."_". $sabor->getId() . "'>" .
            $sabor->getNome() .
            "</option>";
        }
        echo "</select><br />";
    }
}


?>

