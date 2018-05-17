<?php

    include_once('../../config/dbConfig.php');
    $db = new Database;
    $db->connect();

    if(isset($_POST['submit'])){
        $iduser = validateUpdate('updateNIP');
        $updateNama = validateUpdate('updateNama');
        $updateNIK = validateUpdate('updateNIK');
        $updateJabatan = validateUpdate('updateJabatan');
        $updatePangkat = validateUpdate('updatePangkat');
        $updateOPD = validateUpdate('updateOPD');
        $updateInstansi = validateUpdate('updateInstansi');
        $updateEmail = validateUpdate('updateEmail');
        $updateTelepon = validateUpdate('updateTelepon');
    }

    function validateUpdate($x){
        if(isset($_POST[$x])&&!empty($_POST[$x])) return $_POST[$x];
        else return 'invalid input';
    }

    $updateEmail = $db->escapeString($updateEmail);

    $db->update('user',array(
        'nama'=>$updateNama,
        'nik'=>$updateNIK,
        'jabatan'=>$updateJabatan,
        'pangkat_golongan'=>$updatePangkat,
        'id_opd'=>$updateOPD,
        'instansi'=>$updateInstansi,
        'email'=>$updateEmail,
        'telepon'=>$updateTelepon
    ), 'iduser="'.$iduser.'"');
    $res = $db->getResult();

    if($res){
        echo "<script>alert('Success!')</script>";
        header('Location: ../../index.php?pageid=admUser');
    }else {
        echo "<script>alert('Failed!')</script>";
        header('Location: ../../index.php?pageid=admUser');
    }

?>
