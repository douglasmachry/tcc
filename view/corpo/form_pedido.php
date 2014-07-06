<?php
    +extract($_POST);
    include_once '../../ctrl/TamanhoDAO.php';
    include_once '../../ctrl/TipoProdutoDAO.php';
    
    $tamanhos = new TamanhoDAO();
    $tamanhos = $tamanhos->listarTodos();
    $tipoProdutos = new TipoProdutoDAO();
    $tipoProdutos = $tipoProdutos->listarTodos();
    
?>
<label id="<?php echo $id; ?>" class="clientePedido">Cliente: <?php echo $nome; ?></label><br />
<fieldset>
    <legend>Pizzas</legend>
    Tamanho: 
    <select id="tamanhos">
        
        <?php
            foreach($tamanhos as $tam){
                echo "<option value='".$tam->getId()."_".$tam->getQuantSabores()."'>".
                        $tam->getNome().
                     "</option>";   
            }
        ?>
    </select>
    <div id="sabores"></div>
    Observa&ccedil;&otilde;es:<br /> 
    <textarea name='observacoesPizza'></textarea><br />
    <div id="precoPizza"></div>
    <button id="addPizza" class="submit">Adicionar &agrave; Lista</button>
    <br />
</fieldset>
<fieldset>
    <legend>Outros Produtos</legend>
    Tipo: 
    <select id="tipoProdutos">
    <?php
        foreach ($tipoProdutos as $tp){
            echo "<option value = '".$tp->getId()."'>".
                    $tp->getNome().
                 "</option>";
        }
    ?>    
    </select>
    Produto: <label id="carregaProdutos"></label><br />
    Observa&ccedil;&otilde;es:<br /> 
    <textarea name='observacoesProduto'></textarea><br />
    <div id="precoProduto"></div>
    <button id="addProduto" class="submit">Adicionar &agrave; Lista</button>
</fieldset>

