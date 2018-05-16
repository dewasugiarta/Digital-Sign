<?php

    include_once('../../config/dbConfig.php');
    $db = new Database;
    $db->connect();

    if(isset($_POST['submit'])){
        $id_opd = validateOPD('edit-id-opd');
        $nama_opd = validateOPD('edit-nama-opd');
        $alamat_opd = validateOPD('edit-alamat-opd');
        $telepon_opd = validateOPD('edit-telepon-opd');
        $kepala_opd = validateOPD('edit-kepala-opd');
        $email_opd = validateOPD('edit-email-opd');
    }

    function validateOPD($x){
        if(isset($_POST[$x])&&!empty($_POST[$x])) return $_POST[$x];
        else return 'invalid input';
    }

    $email = $db->escapeString($email_opd);

    $db->update('opd',array(
        'nama_opd'=>$nama_opd,
        'alamat_opd'=>$alamat_opd,
        'telepon_opd'=>$telepon_opd,
        'kepala_opd'=>$kepala_opd,
        'email_opd'=>$email
    ), 'id_opd='.$id_opd);

    header('Location: ../../index.php?pageid=opd');
?>