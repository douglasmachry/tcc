<?php 
    include_once '../../ctrl/MunicipioDAO.php'; 
    $dao = new MunicipioDAO();
    $municipios = $dao->listarTodos();
?>
<h2>Gerenciamento de Bairros</h2>
<div class="colEsquerda">
    <br />
    <label id="msg"></label>
    <form action=".?a=inserir" method="post">
        Nome<br />
        <input type="text" name="nome"><br />
        Munic&iacute;pio<br />
        <select name="municipio">
            <?php
            foreach($municipios as $linha){
                    echo "<option value='".$linha->getId()."'>".$linha->getNome()."</option>";
                }
            
            ?>
        </select><br />         
        Valor da Telentrega (R$)<br />
        <input name="teleEntrega" type="text" class="quant"/><br />
        <input name="form" type="hidden" value="Bairro" /><br />
        <input type="submit" class="submit" value="Cadastrar"><br /><br />
    </form>
</div>

<div class="colDireita">
</div><br />

