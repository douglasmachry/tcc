<?php

require_once 'ctrl/antiInjection.php';
$campos = array();
$valores = array();
$setClass = array();
$getClass = array();
$mCampos =  array();
$valArray = array();
//O índice será utilizado futuramente para percorrer as arrays criadas.
$indice = 0;
//Aqui nós percorremos os dados passados via POST e colocamos o nome dos campos do formulário
//em um array, e os valores em outro array.
foreach ($_POST as $campo => $valor) {
    if(is_array($valor)){
        foreach ($valor as $v){
            $valArray[] = antiInjection($v);
        }
        $campos[] = $campo;
        $valores[] = $valArray;
    }else{
        $campos[] = antiInjection($campo);
        $valores[] = antiInjection($valor);
    }
}

//echo "<script>alert('teste');</script>";

// O último campo é um hidden com o nome da Classe que será instanciada para 
// adicionar os dados
$classe = end($valores);



// Incluindo a Classe e seu respectivo DAO
require_once './model/' . $classe . '.php';
require_once './ctrl/' . $classe . 'DAO.php';

// Instanciando a Classe recém incluída
$objeto = (object) new $classe();

// Recuperando dados sobre a Classe (atributos, métodos, etc..)
$metodos = new ReflectionClass($classe);
// Aqui percorremos a classe em busca dos métodos
foreach ($metodos->getMethods() as $metodo) {
    $nomeMetodo = $metodo->getName(); //passamos o nome do método a uma variável
    if (substr($nomeMetodo, 0, 3) == "get") // caso o método inicie com "get",
        $getClass[] = $nomeMetodo;          // será adicionado à array $getClass[]
    if (substr($nomeMetodo, 0, 3) == "set") // caso o método inicie com "set"
        $setClass[] = $nomeMetodo;          // será adicionado à array $setClass[]
    
}

array_pop($campos); //elimino a última posição do array, pois é o nome do Objeto a ser instanciado
array_pop($valores); //idem ao anterior
//array_shift($setClass); // remove o primeiro método Set (setId)
//array_shift($getClass); // remove o primeiro método Get (getId)

//percorre as funções Set e coloca os valores do formulário no objeto
foreach ($setClass as $set){
    if(is_array($valores[$indice])){
        foreach($valores[$indice] as $val){
            $mCampos[] = $val;
        }
        $objeto->$set($mCampos);
        $mCampos = array();
    }
    $objeto->$set($valores[$indice]);
    $indice++;
}


//instancia a respectiva classe DAO
$dao = $classe."DAO";
$dao = (object) new $dao();
//chama a função editar
$editar = $dao->editar($objeto);
return $editar;

?>