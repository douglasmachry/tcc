<?php
    +extract($_POST);
    require_once './model/' . $form . '.php';
    require_once './ctrl/' . $form . 'DAO.php';
    
    $obj = (object) new $form();
    $dao = $form."DAO";
    $dao = (object) new $dao();
    
    $obj->setId($id);
    if($form == "Receita"){
        
    }
    $dao->remover($obj);
    
?>


