<?php
include("../../config/dbConfig.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];

    }
    $db = new Database;
    $db->connect();


    $column = 'pengajuan.id,user.nama as nama_user,pengajuan.nama,pengajuan.nip,pengajuan.nik,'.
            'pengajuan.pangkat_golongan,pengajuan.jabatan,pengajuan.instansi,pengajuan.kota,'.
            'pengajuan.provinsi, pengajuan.email,pengajuan.tanggal,pengajuan.ktp,'.
            'pengajuan.surat,pengajuan.kegunaan,pengajuan.sistem, pengajuan.status, opd.nama_opd';

    
    $db->select('pengajuan',$column,'user on pengajuan.iduser=user.iduser JOIN opd ON pengajuan.id_opd=opd.id_opd','id="'.$id.'"');

    // $db->select('pengajuan','nip',NULL,'id="'.$id.'"',NULL);
    $res = $db->getResult();
    echo json_encode($res);
?>
