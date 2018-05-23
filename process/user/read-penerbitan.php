<?php
    include("../../config/dbConfig.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $db = new Database;
        $db->connect();
        $db->select('pengajuan',
            'id,'
            .'nama,'
            .'nip,'
            .'nik,'
            .'jabatan,'
            .'pangkat_golongan,'
            .'instansi,'
            .'kota,'
            .'provinsi,'
            .'id_opd,'
            .'email,'
            .'sistem,'
            .'kegunaan,'
            .'ktp,'
            .'surat',NULL,'id="'.$id.'"',NULL);
        $res = $db->getResult();

        echo json_encode($res);
    }
?>
