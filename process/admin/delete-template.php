<?php

    include_once('../../config/dbConfig.php');
    $db = new Database;
    $db->connect();

    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $db->delete('template_surat', 'id_template='.$id);

        $res = $db->getResult();

        echo json_encode($res);
        
    }

?>