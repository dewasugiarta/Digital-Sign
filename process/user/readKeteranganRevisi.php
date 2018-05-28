<?php
    include("../../config/dbConfig.php");
    session_start();

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }

    //echo $status.','.$iduser;
    $db = new Database;
    $db->connect();
    $db->select('pengajuan','keterangan',null,'id='.$id);
    $res = $db->getResult();
    // print_r($res);
    echo json_encode($res);

?>
