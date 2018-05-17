<?php
include("../../config/dbConfig.php");

    if(isset($_GET['iduser'])){
        $id = $_GET['iduser'];

    }
    $db = new Database;
    $db->connect();
    $db->select('user','nama,iduser,nik,jabatan,pangkat_golongan,id_opd,instansi,email,telepon,username',NULL,'iduser="'.$id.'"',NULL);
    $res = $db->getResult();
    echo json_encode($res);
?>
