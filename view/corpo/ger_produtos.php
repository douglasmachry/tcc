<?php
include_once '../../ctrl/TipoProdutoDAO.php';
$dao = new TipoProdutoDAO();
$tipoProdutos = $dao->listarTodos();
?>
<h2>Gerenciamento de Produtos</h2>
<div class="colEsquerda">
    <label id='msg'></label><br />
    <form action=".?a=inserir" method="post">
        Nome<br />
        <input name="nome" type="text"><br />
        <label id="formTipoProduto">
            Classifica&ccedil;&atilde;o<br />
            <select name="tipoProduto">
                <?php 
                    foreach($tipoProdutos as $linha){
                        echo "<option value='".$linha->getId()."'>".$linha->getNome()."</option>";
                    }
                ?>
            </select><span id="addTipoProduto"><img src="view/img/add.png" /></span>
        </label><br />
        Quantidade<br />
        <input name="quantidade" maxlength="7" type="text" class="quant" />
        <select name="medida">
            <option value="kg">Kg</option>
            <option value="g">g</option>
            <option value="un">Un</option>
        </select><br />
        Valor (R$)<br />
        <input name="preco" type="text" class="preco"><br />
        <input type='hidden' name="form" value="Produto" /><br />
        <input type="submit" class="submit" value="Cadastrar"><br /><br />
    </form>
</div>
<div class="colDireita">
</div>
