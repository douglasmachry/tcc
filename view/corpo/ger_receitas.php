<?php

include_once '../../ctrl/SaborDAO.php';
include_once '../../ctrl/TamanhoDAO.php';

$dao = new SaborDAO();
$sabores = $dao->listarTodos();
$dao = new TamanhoDAO();
$tamanhos = $dao->listarTodos();
?>
<h2>Gerenciamento de Receitas</h2>
<div class="colEsquerda">
    <label id="msg"></label>
    <form action="" method="">
        Receita:
        <input type="text" readonly="readonly" id="nomeReceita" /><br /><br />
        Selecione abaixo o sabor e o tamanho:<br />
        Sabor<br />
        <select id="sabor">
            <option value="">-</option>
            <?php
            foreach ($sabores as $sabor) {
                echo "<option value='" . $sabor->getId() . "'>"
                . $sabor->getNome()
                . "</option>";
            }
            ?>
        </select><br />
        Tamanho <br />
        <select id="tamanho">
            <option value="">-</option>
            <?php
            foreach ($tamanhos as $tamanho) {
                echo "<option value='" . $tamanho->getId() . "'>"
                . $tamanho->getNome()
                . "</option>";
            }
            ?>
        </select><br />
        
        <input type='hidden' name="form" value="Receita" /><br />
    </form>
</div>

<div class="colDireita">
    
</div>
