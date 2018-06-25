<?php

    include_once('../../config/dbConfig.php');
    $db = new Database;
    $db->connect();

    if(isset($_POST['id'])){
        $jenis = validate('jenis');
        $id= validate('id');
        $nip = validate('nip');
    }

    function validate($x){
        if(isset($_POST[$x])&&!empty($_POST[$x])) return $_POST[$x];
        else return NULL;
    }

    if($jenis=='pencabutan'){
        $db->update('pencabutan', array(
            'status'=>1
        ), 'id_pencabutan='.$id);

        $res = $db->getResult();
        echo $res[0];
    }else if($jenis='pengajuan'){
        //update status pencabutan
        $db->update('pencabutan', array(
            'status'=>1
        ), 'id_pencabutan='.$id);

        $res = $db->getResult();
        if($res[0]==1){
            //update status, src file pengajuan
            $db->select('pencabutan','surat',NULL,'id_pencabutan='.$id);
            $surat = $db->getResult();
            $surat = $surat[0]['surat'];


            $db->update('pencabutan', array(
                'status'=>1
            ), 'id_pengajuan='.$id);
            $res = $db->getResult();

            $db->update('pengajuan', array(
                'surat'=>$surat,
                'status'=>0
            ), 'nip='.$nip);

            $res = $db->getResult();
            echo json_encode($res);
        }


    }else{
        die('Unidentified type of request');
    }

    // // header('Location: ../../index.php?pageid=opd');
    // $db->update('pencabutan', array(
    //     'status'=>1
    // ), 'id_pencabutan='.$id_pencabutan);

    // $res = $db->getResult();
    // echo $res[0];
?>