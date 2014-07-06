<?php
    //+extract($_POST);
    require_once '../../ctrl/antiInjection.php';
    require_once '../../model/Receita.php';
    require_once '../../ctrl/ReceitaDAO.php';
    require_once '../../ctrl/ProdutoDAO.php';
    //echo "<script>alert('teste');</script>";
    $nome = antiInjection($_POST['nome']);
    $receitaDao = new ReceitaDAO();
    $produtoDao = new ProdutoDAO();
    
    $consulta = $receitaDao->pesquisarElementoPorNome($nome);
    $produtos = $produtoDao->listarTodos();
    if(count($consulta) > 0){
?>
<div id="ingredientes">

            <table>
                <tr class="titulos">
                    <td>Produto</td>
                    <td>Quantidade</td>
                    <td> </td>
                <tr>
                <tr>
                    <td>
                        <select id="produto">
                            
                            <?php
                            foreach ($produtos as $produto) {
                                echo "<option value='" . $produto->getId() . "'>"
                                . $produto->getNome()
                                . "</option>";
                            }
                            ?>
                        </select>
                    </td>
                    <td>
                        <input id="quantProduto" type="text" class="quant" />
                        <select id="medida">
                            <option value="kg">Kg</option>
                            <option value="g">g</option>
                            <option value="un">Un</option>
                        </select>
                    </td>
                    <td>
                        <span id="addIngrediente">
                            <img src="view/img/add.png" />
                        </span>
                    </td>
                </tr>
                <?php
                    while ($row = mysql_fetch_array($consulta)) {
                        $novoCampo = "<tr class='listaProdutos'>";
                        $novoCampo .= "<td><select name='produto[]' readonly='readonly'>";
                        $novoCampo .= "<option selected>".$row['nomeProduto']."</option>";
                        $novoCampo .= "</select></td>";
                        $novoCampo .= "<td><input type='text' value='" .str_replace(".",",",$row['quantidade']). "' readonly>";
                        $novoCampo .= "<input type='text' name='medida[]' value='" .$row['medida']. "' readonly> </td>";
                        $novoCampo .= "<td><span class='remover' id='r".$row['id']."'><img src='view/img/icone_remover.png' /></span></td>";
                        $novoCampo .= "</tr>";
                        echo $novoCampo;
                    }
                ?>
            </table>
</div>
    <?php } ?>