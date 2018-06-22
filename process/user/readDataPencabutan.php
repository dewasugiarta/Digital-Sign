<?php
    include("../../config/dbConfig.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $db = new Database;
        $db->connect();
        $db->select('pengajuan',
            'pengajuan.id,'
            .'pengajuan.iduser,'
            .'pengajuan.nama,'
            .'pengajuan.nip,'
            .'opd.nama_opd,'
            .'pengajuan.jabatan,'
            .'pengajuan.pangkat_golongan,'
            .'pengajuan.instansi,'
            .'pengajuan.kegunaan,'
            .'pengajuan.sistem','opd ON pengajuan.id_opd=opd.id_opd','id="'.$id.'"');
        $res = $db->getResult();

        echo json_encode($res);
    }
?>
