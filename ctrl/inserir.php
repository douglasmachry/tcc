<?php
/* REGRAS:
 * - ANTES DO BOTÃO "ENVIAR", O FORMULÁRIO DEVE TER UM INPUT TYPE HIDDEN,
 *   COM O NOME DE "form" E O VALOR DEVE SER O MESMO NOME DO ARQUIVO OBJETO.
 * - OS MÉTODOS GET E SET DEVEM ESTAR NA MESMA SEQUÊNCIA DOS CAMPOS DO FORMULÁRIO
 * 
 * 
 *  */


//echo "<script>alert('teste');</script>";
// plugin para tratar os dados antes de inserir
require_once 'ctrl/antiInjection.php';
//Criando os arrays para guardar o nome dos campos, dos valores, dos métodod Get e Set
$campos = array();
$valores = array();
$setClass = array();
$getClass = array();
$mCampos =  array();
$valArray = array();
$subArray = array();
//O índice será utilizado futuramente para percorrer as arrays criadas.
$indice = 0;
//Aqui nós percorremos os dados passados via POST e colocamos o nome dos campos do formulário
//em um array, e os valores em outro array.
foreach ($_POST as $campo => $valor) {
    if(is_array($valor)){ //Se for array, faz um loop tratando os dados de cada posição
              
        foreach ($valor as $v){
                                 
            if(is_array($v)){
              foreach ($v as $val){
                              
                  $subArray[] = antiInjection($val);
              }
              $valArray[] = $subArray;
              $subArray = array();
            }else{
                $valArray[] = antiInjection($v);
            }            
        }
        
        $campos[] = $campo;
        $valores[] = $valArray;
        $valArray = array();
    }else{
        $campos[] = antiInjection($campo);
        $valores[] = antiInjection($valor);
    }
}


// O último campo é um hidden com o nome da Classe que será instanciada para 
// adicionar os dados
$classe = end($valores);
//echo $classe;

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

array_pop($campos); //elimino a última posição do array, pois é o nome do objeto a ser instanciado
array_pop($valores); //idem ao anterior
array_shift($setClass); // remove o primeiro método Set (setId) 
array_shift($getClass); // remove o primeiro método Get (getId)

//Loop no array $setClass, jogando os valores do formulário para o respectivo objeto
foreach ($setClass as $set){
    
    if(is_array($valores[$indice])){
        foreach($valores[$indice] as $val){
            if(is_array($val)){
                foreach ($val as $v){
                    $subArray[] = $v;
                }
                $mCampos[] = $subArray;
                $subArray = array();
            }else{
                $mCampos[] = $val;
            }
            
        }
        $objeto->$set($mCampos);
        $mCampos = array();
        
    }
    $objeto->$set($valores[$indice]);
    $indice++;
}

$dao = $classe."DAO";
$dao = (object) new $dao();

$inserir = $dao->inserir($objeto);
return $inserir;
/*foreach ($getClass as $get){
    echo $objeto->$get($campos[$indice]);
}*/

?>