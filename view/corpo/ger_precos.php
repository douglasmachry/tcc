<?php
    include_once '../../ctrl/TipoSaborDAO.php';
    include_once '../../ctrl/TamanhoDAO.php';

    $dao = new TipoSaborDAO();
    $tipoSabores = $dao->listarTodos();
    $dao = new TamanhoDAO();
    $tamanhos = $dao->listarTodos();
?>
<h2>Gerenciamento de Pre&ccedil;os</h2>
<div class="colEsquerda">
    <label id="msg"></label><br />
    <form action=".?a=inserir" method="post">
        Pizza:
        <input type="text" readonly="readonly" id="nomeReceita"  name="nome"/><br /><br />
        Selecione abaixo a classifica&ccedil;&atilde;o e o tamanho:<br />
        Classificação<br />
        <select id="sabor" name="tipoSabor">
            <option value="">-</option>
            <?php
            foreach ($tipoSabores as $sabor) {
                echo "<option value='" . $sabor->getId() . "'>"
                . $sabor->getNome()
                . "</option>";
            }
            ?>
        </select><br />
        Tamanho <br />
        <select id="tamanho" name="tamanho">
            <option value="">-</option>
            <?php
            foreach ($tamanhos as $tamanho) {
                echo "<option value='" . $tamanho->getId() . "'>"
                . $tamanho->getNome()
                . "</option>";
            }
            ?>
        </select><br />
        Pre&ccedil;o (R$)<br />
        <input type="text" name="preco" class="preco"/><br /><br />
        <input type="hidden" name="form" value="Preco" />
        <input type="submit" class="submit" value="Cadastrar"><br /><br />
    </form></div>
<div class="colDireita">
</div>
