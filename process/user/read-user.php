<?php
include("../../config/dbConfig.php");

    if(isset($_GET['username'])){
        $uname = $_GET['username'];

    }
    $db = new Database;
    $db->connect();
    $db->select('user','nama,iduser,nik,jabatan,pangkat_golongan,id_opd,instansi,email,telepon,username',NULL,'username="'.$uname.'"',NULL);
    $res = $db->getResult();
    echo json_encode($res);
?>
