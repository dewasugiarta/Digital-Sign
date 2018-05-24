<?php
    include_once '../../config/dbConfig.php';

    if(isset($_POST['submit'])){
        $id = $_POST['updateId'];
        $nama = $_POST['updateNama'];
        $nip = $_POST['updateNIP'];
        $nik = $_POST['updateNIK'];
        $jabatan = $_POST['updateJabatan'];
        $instansi = $_POST['updateInstansi'];
        $pangkat_golongan = $_POST['updatePangkat'];
        $kota = $_POST['updateKota'];
        $provinsi = $_POST['updateProvinsi'];
        $id_opd = $_POST['updateOPD'];
        $email = $_POST['updateEmail'];
        $sistem = $_POST['updateSistem'];
        $kegunaan = $_POST['updateKegunaan'];
        $ktp = $_FILES['updateKTP'];
        $surat = $_FILES['updateSurat'];
        $linkKTP = getLinkKtp($ktp,$nip);
        $linkSurat = getLinkSurat($surat,$nip);
        $status = '2';

        try {
            $db = new Database();
            $db->connect();
            $db->update('pengajuan',array(
                'nama'=>$nama,
                'nik'=>$nik,
                'jabatan'=>$jabatan,
                'instansi'=>$instansi,
                'pangkat_golongan'=>$pangkat_golongan,
                'kota'=>$kota,
                'provinsi'=>$provinsi,
                'id_opd'=>$id_opd,
                'email'=>$email,
                'sistem'=>$sistem,
                'kegunaan'=>$kegunaan,
                'ktp'=>$linkKTP,
                'surat'=>$linkSurat,
                'status'=>$status
            ), 'id="'.$id.'" AND nip="'.$nip.'"'); // Table name, column names and values, WHERE conditions
            $res = $db->getResult();

            uploadKTP($linkKTP,$ktp);
            uploadSurat($linkSurat,$surat);
            echo "<script type='text/javascript'>alert('Update Data Sukses!');
                        window.location='../../index.php?pageid=userPenerbitan';
                </script>";

        } catch (Exception $e) {
            echo $e;
        }

    }

    // echo $id."|".$nama."|".$nip."|".$nik."|".$pangkat_golongan."|".$jabatan."|".$instansi."|".$email."|".$kota."|".$provinsi
    //     ."|".$id_opd."|".$sistem."|".$kegunaan."|".$linkKTP."|".$linkSurat."|".$status;

    function getLinkKtp($ktp,$nip){
        //get extention file
        $ktpExt = explode('.',$ktp['name']);
        $ktpExt = end($ktpExt);
        //move data from tmp to actual path
        return $linkUploadKtp = 'src/userKtp/'.$nip.'.'.$ktpExt;
    }

    function getLinkSurat($surat,$nip){
        //get ext surat
        $suratExt = explode('.',$surat['name']);
        $suratExt = end($suratExt);
        //simpan nama data saja ke database
        return $linkUploadSurat = 'src/userSurat/'.$nip.'.'.$suratExt;
    }

    function uploadKTP($linkKTP,$ktp){
        //rename file and directory
        $uploadKtp = '../../'.$linkKTP;

        $tmpKtpDir = $ktp['tmp_name'];
        $error = $ktp['error'];

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
        return true;
    }

    function uploadSurat($linkSurat,$surat){
        //rename & directory
        $uploadSurat = '../../'.$linkSurat;
        //move data from tmp to actual path
        $tmpSuratDir = $surat['tmp_name'];
        $error = $surat['error'];
        move_uploaded_file($tmpSuratDir, $uploadSurat);

        return true;

    }
?>
