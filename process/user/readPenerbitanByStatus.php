<?php
    include("../../config/dbConfig.php");
    session_start();

    if(isset($_GET['status'])){
        $status = $_GET['status'];
        $iduser = $_SESSION['iduser'];
    }

    //echo $status.','.$iduser;
    $db = new Database;
    $db->connect();
    $db->select('pengajuan',
                  'pengajuan.id, pengajuan.nama, pengajuan.nip, opd.nama_opd, pengajuan.tanggal, pengajuan.status',
                  'opd ON pengajuan.id_opd=opd.id_opd','iduser="'.$iduser.'" AND status="'.$status.'" ','tanggal DESC');
    $res = $db->getResult();
    // print_r($res);
    echo json_encode($res);
    
?>
