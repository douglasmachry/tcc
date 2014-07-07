<?php

+extract($_POST);

switch ($filtro) {
    case "nome":
        include_once '../../ctrl/ClienteDAO.php';
        $clienteDAO = new ClienteDAO();
        $campo = "Nome: <input type = 'text' id = 'filtro' />";
        break;
    case "idMunicipio":
        include_once '../../ctrl/MunicipioDAO.php';
        $municipioDAO = new MunicipioDAO();
        $lista = $municipioDAO->listarTodos();
        $campo = "Munic&iacute;pio: <select id = 'filtro'>";
        foreach ($lista as $mun) {
            $campo .= "<option value = '" . $mun->getId() . "'>" . $mun->getNome() . "</option>";
        }
        $campo .= "</select>";
        break;
    case "idBairro":
        include_once '../../ctrl/BairroDAO.php';
        $bairroDAO = new BairroDAO();
        $lista = $bairroDAO->listarTodos();
        $campo = "Bairro: <select id='filtro'>";
        foreach ($lista as $bairro) {
            $campo .= "<option value='" . $bairro->getId() . "'>" . $bairro->getNome() . "</option>";
        }
        $campo .= "</select>";
        break;
    default:
        $campo = "";
        break;
}

echo $campo;
?>
<br />
Ordenar por:
<select id="grupo">
        <option value="">Selecione</option>
        <option value="nome">Nome</option>
        <option value="idMunicipio">Munic&iacute;pio</option>
        <option value="idBairro">Bairro</option>
</select><br />