<?php
    include_once '../../ctrl/MunicipioDAO.php'; 
    include_once '../../ctrl/BairroDAO.php';
    $dao = new MunicipioDAO();
    $municipios = $dao->listarTodos();
    $dao = new BairroDAO();
    $bairros = $dao->listarTodos();

?>

<h2>Gerenciamento de Operadores</h2>
<div class="colEsquerda">
    <form action=".?a=inserir" method="post">
    <label id="msg"></label><br />
    Nome<br />
    <input type="text" name="nome"><br />
    Nome de usu&aacute;rio<br />
    <input type="text" name="usuario"><br />
    RG <br />
    <input type="text" name="rg" class="numero" maxlength="10"><br />
    CPF<br />
    <input type="text" name="cpf" class="cpf"><label id="erroCPF"></label><br />
    Perfil<br />
    <select name="perfil">
        <option value="operador">Operador</option>
        <option value="admin">Administrador</option>
    </select><br />

    Munic&iacute;pio<br />
    <select name="municipio">
        <?php
        foreach($municipios as $linha){
                echo "<option value='".$linha->getId()."'>".$linha->getNome()."</option>";
            }

        ?>
    </select><br />
    Bairro<br />
    <select name="bairro">
        <?php
        foreach($bairros as $linha){
                echo "<option value='".$linha->getId()."'>".$linha->getNome()."</option>";
            }

        ?>
    </select><br />
    Endere&ccedil;o<br />
    <input type="text" name="endereco" ><br />
    Senha<br />
    <input name="senha" type="password" ><br />
    <input type="hidden" name="form" value="Usuario" /><br />
    <input class="submit" type="submit" value="Cadastrar"><br /><br />
</form>
</div>
<div class="colDireita">

</div>
    