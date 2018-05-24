<?php

    include_once('../../config/dbConfig.php');

    $db = new Database;
    $db->connect();


    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $status = $_POST['status'];
        $keterangan = isset($_POST['keterangan'])?$_POST['keterangan']:'';

        $db->update('pengajuan',array('status'=>$status,'keterangan'=>$keterangan), 'id='.$id);
        $res = $db->getResult();
        echo json_encode($res);
    }

    header('Location: ../../index.php?pageid=penerbitan');

?>