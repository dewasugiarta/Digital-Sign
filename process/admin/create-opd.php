<?php

    include_once('../../config/dbConfig.php');

    $db = new Database;
    $db->connect();


    if(isset($_POST['submit'])){
        $nama_opd = validateOPD('nama-opd');
        $alamat_opd = validateOPD('alamat-opd');
        $telepon_opd = validateOPD('telepon-opd');
        $kepala_opd = validateOPD('kepala-opd');
        $email_opd = validateOPD('email-opd');
    }

    function validateOPD($x){
        if(isset($_POST[$x])&&!empty($_POST[$x])) return $_POST[$x];
        else return '';
    }

    $email = $db->escapeString($email_opd);
    $db->insert('opd',array(
        'nama_opd'=>$nama_opd,
        'alamat_opd'=>$alamat_opd,
        'telepon_opd'=>$telepon_opd,
        'kepala_opd'=>$kepala_opd,
        'email_opd'=>$email
    ));

    $res = $db->getResult();
    header('Location: ../../index.php?pageid=opd');

    // $newOPD = array(
    //     $nama_opd, $alamat_opd, $telepon_opd, $kepala_opd, $email_opd
    // );

    // print_r($newOPD);
?>