<?php
include("../../config/dbConfig.php");

    $db = new Database;
    $db->connect();
    $db->select('opd','id_opd,nama_opd', NULL, 'id_opd');
    $res = $db->getResult();
    echo json_encode($res);
?>
