<?php
include_once '../../ctrl/MunicipioDAO.php';
include_once '../../ctrl/BairroDAO.php';
$dao = new MunicipioDAO();
$municipios = $dao->listarTodos();
$dao = new BairroDAO();
$bairros = $dao->listarTodos();
?>

<h2>Gerenciamento de Clientes</h2>
<div class="colEsquerda">
    <label id="msg"></label>
    <form action=".?a=inserir" method="post">
        Nome<br />
        <input type="text" name="nome"><br />
        RG <br />
        <input type="text" name="rg" class="numero" maxlength="10"><br />
        CPF<br />
        <input type="text" name="cpf" class="cpf"><label id="erroCPF"></label><br />
        Munic&iacute;pio<br />
        <select name="municipio">
            <?php
            foreach ($municipios as $linha) {
                echo "<option value='" . $linha->getId() . "'>" . $linha->getNome() . "</option>";
            }
            ?>
        </select><br />
        Bairro<br />
        <select name="bairro">
            <?php
            foreach ($bairros as $linha) {
                echo "<option value='" . $linha->getId() . "'>" . $linha->getNome() . "</option>";
            }
            ?>
        </select><br />
        Endere&ccedil;o<br />
        <input type="text" name="endereco" ><br />
        Telefone <br />
        <div class="telefones">
            <label><input type="text" name="telefone[]" class="phone"/></label>&nbsp;&nbsp;<br />
        </div> 
        <span id="addTelefone"><img src="./view/img/add.png" /></span>
        <br />
        Observa&ccedil;&otilde;es<br />
        <textarea cols="17" rows="5" name="observacoes" ></textarea><br />
        <input type="hidden" name="form" value="Cliente" /><br />
        <input type="submit" class="submit" value="Cadastrar"><br /><br />
    </form>
</div>
<div class="colDireita">
</div>

