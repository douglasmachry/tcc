<br />
<ul class="submenu">
    <li>
        <a id="ger_clientes" href="#">
            <img src="./view/img/icone_clientes.png"><br />
            Clientes
        </a>
    </li>
    <?php if ($_SESSION['perfil'] == "admin") { ?>
        <li>
            <a id="ger_operadores" href="#">
                <img src="./view/img/icone_operadores.png"><br />
                Operadores
            </a>
        </li>	
        <li>
            <a id="ger_municipios" href="#">
                <img src="./view/img/icone_municipio.png"><br />
                Munic&iacute;pios
            </a>
        </li>
        <li>
            <a id="ger_bairros" href="#">
                <img src="./view/img/icone_bairro.png"><br />
                Bairros</a>
        </li>
        <li>
            <a id="ger_precos" href="#">
                <img src="./view/img/icone_preco.png"><br />
                Pre&ccedil;os
            </a>
        </li>
    </ul>
    <ul class="submenu">
        <li>
            <a id="ger_tipoSabor" href="#">
                <img src="./view/img/icone_tipoPizza.png"><br />
                Tipos de Pizza</a>
        </li>
        <li>
            <a id="ger_tamanhos" href="#">
                <img src="./view/img/icone_tamanho.png"><br />
                Tamanhos de Pizza
            </a>
        </li>
        <li>
            <a id="ger_sabores" href="#">
                <img src="./view/img/icone_pizza.png"><br />
                Sabores de Pizza
            </a>
        </li>
        <li>
            <a id="ger_receitas" href="#">
                <img src="./view/img/icone_receita.png"><br />
                Receitas
            </a>
        </li>
        <li>
            <a id="ger_produtos" href="#">
                <img src="./view/img/icone_produtos.png"><br />
                Produtos
            </a>
        </li>
    <?php } ?>
</ul>
<div id="formulario">

</div>