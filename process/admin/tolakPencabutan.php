<?php

include_once('../../config/dbConfig.php');
    $db = new Database;
    $db->connect();

    if(isset($_POST['id_pencabutan'])){
        $id = validate('id_pencabutan');
    }

    function validate($x){
        if(isset($_POST[$x])&&!empty($_POST[$x])) return $_POST[$x];
        else return NULL;
    }

    $db->update('pencabutan', array(
        'status'=>1
    ), 'id_pencabutan='.$id);

    $res = $db->getResult();

    echo $res[0];

?>