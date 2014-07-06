<?php
include_once '../../ctrl/TipoSaborDAO.php';
$dao = new TipoSaborDAO();
$tipoSabores = $dao->listarTodos();
?>
<h2>Gerenciamento de Sabores de Pizza</h2>
<div class="colEsquerda">
    <label id="msg"></label>
    <br />
    <form action=".?a=inserir" method="post">
        Nome<br />
        <input type="text" name="nome"><br />
        Classifica&ccedil;&atilde;o<br />
        <select name="tipoSabor">
            <?php
                foreach ($tipoSabores as $linha) {
                    echo "<option value='" . $linha->getId() . "'>" . $linha->getNome() . "</option>";
                }
            ?>
        </select>
        <br />
        <input type="hidden" name="form" value="Sabor" /><br />
        <input type="submit" class="submit" value="Cadastrar"><br /><br />
    </form>
</div>
<div class="colDireita">
</div>

