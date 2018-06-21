<?php
include("../../config/dbConfig.php");

    if(isset($_POST['submit'])){
        $tanggalTerbit = isset($_POST['tanggal-terbit'])||!empty($_POST['tanggal-terbit'])?$_POST['tanggal-terbit']:false;
        $id = isset($_POST['id'])||!empty($_POST['id'])?$_POST['id']:false;
    }

    $db = new Database;
    $db->connect();

    if($tanggalTerbit){
        $db->update('pengajuan',array(
            'tanggal_terbit'=>$tanggalTerbit,
            'status'=>4
        ), 'id='.$id);
    }

    header('Location: ../../index.php?pageid=penerbitan');


?>
