<?php
    include_once('../../config/dbConfig.php');

    if(isset($_POST['id_opd'])&&!empty($_POST['id_opd'])){

        $db = new Database;
        $db->connect();

        $id_opd = $_POST['id_opd'];

        $db->delete('opd', 'id_opd='.$id_opd);

        $res = $db->getResult();

        echo json_encode($res);

    }

?>