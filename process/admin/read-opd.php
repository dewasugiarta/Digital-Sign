<?php

    if(isset($_GET['id_opd'])){
        $id = $_GET['id_opd'];
        include_once('../../config/dbConfig.php');
        $db = new Database;
        $db->connect();

        $db->select('opd', 'id_opd,nama_opd,alamat_opd,kepala_opd,telepon_opd,email_opd',NULL,'id_opd='.$id);

        $res = $db->getResult();
        echo json_encode($res);
    }
?>