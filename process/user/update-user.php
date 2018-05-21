<?php
include("../../config/dbConfig.php");

    $db = new Database;
    $db->connect();
    

    if(isset($_POST['submit'])){
        $nama = validateItem('nama');
        $nik = validateItem('nik');
        $pangkat_golongan = validateItem('pangkat_golongan');
        $jabatan = validateItem('jabatan');
        $instansi = validateItem('instansi');
        $id_opd = validateItem('opd');
        $email = validateItem('email');
        $telepon = validateItem('telepon');

        $username = validateItem('uname');

        $email = $db->escapeString($email);

    }

    function validateItem($x){
        if(isset($_POST[$x])&&!empty($_POST[$x])) return $_POST[$x];
        else return false;
    }

    // update data user
    $db->update('user',array(
        'nama'=>$nama,
        'nik'=>$nik,
        'jabatan'=>$jabatan,
        'pangkat_golongan'=>$pangkat_golongan,
        'id_opd'=>$id_opd,
        'instansi'=>$instansi,
        'email'=>$email,
        'telepon'=>$telepon
    ), 'username="'.$username.'"');
    $res = $db->getResult();

    if($res){
        header('Location: ../../index.php?pageid=profile');
    }else{
        echo 'error';
    }
?>
