<?php
    include_once '../../config/dbConfig.php';
    $db = new Database();
    $db->connect();
    session_start();

    if(isset($_POST['submit'])){
        $iduser = $_SESSION['iduser'];
        $nama = validateUser('nama');
        $nip = validateUser('nip');
        $nik = validateUser('nik');
        $pangkat = validateUser('pangkat');
        $jabatan = validateUser('jabatan');
        $instansi = validateUser('instansi');
        $email = validateUser('email');
        $kota = validateUser('kota');
        $provinsi = validateUser('provinsi');
        $opd = validateUser('opd');
        $sistem = validateUser('sistem');
        $kegunaan = validateUser('kegunaan');
        $ktp = $_FILES['ktp'];
        $surat = $_FILES['surat'];
        $status = '0';


        //get extention file
        $ktpExt = explode('.',$ktp['name']);
        $ktpExt = end($ktpExt);
        //rename file and directory
        $uploadKtp = '../../src/userKtp/'.$nip.'.'.$ktpExt;
        //move data from tmp to actual path
        $tmpKtpDir = $ktp['tmp_name'];
        move_uploaded_file($tmpKtpDir, $uploadKtp);
        // proses resize
        $width_size = 500;
        $resize_image = $uploadKtp;
        list( $width, $height ) = getimagesize($uploadKtp);
        $k = $width / $width_size;// mendapatkan nilai pembagi supaya ukuran skala image yang dihasilkan sesuai dengan aslinya
        $newwidth = $width / $k;// menentukan width yang baru
        $newheight = $height / $k;// menentukan height yang baru
        $thumb = imagecreatetruecolor($newwidth, $newheight);// fungsi untuk membuat image yang baru
        $source = imagecreatefromjpeg($uploadKtp);
        // men-resize image yang baru
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
        // menyimpan image yang baru
        imagejpeg($thumb, $resize_image);
        imagedestroy($thumb);
        imagedestroy($source);


        //get ext surat
        $suratExt = explode('.',$surat['name']);
        $suratExt = end($suratExt);
        //rename & directory
        $uploadSurat = '../../src/userSurat/'.$iduser.'.'.$suratExt;
        //move data from tmp to actual path
        $tmpSuratDir = $surat['tmp_name'];
        move_uploaded_file($tmpSuratDir, $uploadSurat);



        // echo $iduser."|".$nama."|".$nip."|".$nik."|".$pangkat."|".$jabatan."|".$instansi."|".$email."|".$telepon."|".$kota."|".$provinsi
        //     ."|".$opd."|".$sistem."|".$kegunaan."|".$uploadKtp."|".$uploadSurat."|".$status;
        $db->insert('pengajuan', array(
            'iduser'=>$iduser,
            'nama'=>$nama,
            'nip'=>$nip,
            'nik'=>$nik,
            'jabatan'=>$jabatan,
            'pangkat_golongan'=>$pangkat,
            'instansi'=>$instansi,
            'email'=>$email,
            'kota'=>$kota,
            'provinsi'=>$provinsi,
            'id_opd'=>$opd,
            'sistem'=>$sistem,
            'kegunaan'=>$kegunaan,
            'ktp'=>$uploadKtp,
            'surat'=>$resize_image,
            'status'=>$status
        ));
        $res = $db->getResult();


        $db->disconnect();
        header('Location: ../../index.php?pageid=userPenerbitan');

    }else {
        Header('location : ../../index.php?pageid=formPenerbitan');
    }


    function validateUser($x){
        if(isset($_POST[$x])&&!empty($_POST[$x])) return $_POST[$x];
        else return '';
    }
?>
