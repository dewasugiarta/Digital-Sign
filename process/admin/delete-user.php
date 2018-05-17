<?php
    include_once('../../config/dbConfig.php');

    if(isset($_POST['iduser'])&&!empty($_POST['iduser'])){

        $db = new Database;
        $db->connect();

        $iduser = $_POST['iduser'];

        $db->delete('user', 'iduser="'.$iduser.'"');

        $res = $db->getResult();
        echo json_encode($res);
    }
?>
