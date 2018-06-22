<?php
    include_once '../../config/dbConfig.php';
    $db = new Database();
    $db->connect();
    session_start();

    if(isset($_POST['submit'])){
        $iduser = validateUser('idUser');
        $id = validateUser('idPengajuan');
        $pengajuan = validateUser('pengajuan');
        $alasan = validateUser('alasan');
        $surat = $_FILES['suratPencabutan'];
        $status = '0';

        //get ext surat
        $suratExt = explode('.',$surat['name']);
        $suratExt = end($suratExt);
        //rename & directory
        $uploadSurat = '../../src/userSurat/pencabutan'.$id.'.'.$suratExt;
        //move data from tmp to actual path
        $tmpSuratDir = $surat['tmp_name'];
        move_uploaded_file($tmpSuratDir, $uploadSurat);

        //simpan nama data saja ke database
        $linkUploadSurat = 'src/userSurat/pencabutan'.$id.'.'.$suratExt;

        // echo $iduser."|".$nama."|".$nip."|".$nik."|".$pangkat."|".$jabatan."|".$instansi."|".$email."|".$telepon."|".$kota."|".$provinsi
        //     ."|".$opd."|".$sistem."|".$kegunaan."|".$uploadKtp."|".$uploadSurat."|".$status;
        $db->insert('pencabutan', array(
            'id'=>$id,
            'iduser'=>$iduser,
            'pengajuan'=>$pengajuan,
            'surat'=>$linkUploadSurat,
            'status'=>$status,
            'alasan'=>$alasan
        ));
        $res = $db->getResult();

        $db->update('pengajuan',array(
            'status'=>4,
            'status_pencabutan'=> 1
        ), 'id='.$id);
        $res = $db->getResult();

        header('Location: ../../index.php?pageid=userPencabutan');
        $db->disconnect();
    }else {
        header('Location: ../../index.php?pageid=userPencabutan');
    }

    function validateUser($x){
        if(isset($_POST[$x])&&!empty($_POST[$x])) return $_POST[$x];
        else return '';
    }
?>
