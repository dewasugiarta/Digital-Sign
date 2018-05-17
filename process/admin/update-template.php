<?php

    if(isset($_POST['submit'])){

        //db setup
        include_once('../../config/dbConfig.php');
        $db = new Database;
        $db->connect();

        $file = ($_FILES['file']);


        //get file extension
        //specify upload dir
        //verify err
        $fileExt = explode('.',$file['name']);
        $fileExt = end($fileExt);

        $uploadDir = './src/surat';

        $uploadName = '/template_surat_rekomendasi.'.$fileExt;
        $uploadDate = date('Y-m-d');
        $uploadTime = date('H:i:s');

        $db->select('template_surat', 'id_template,nama_template,source,upload_date,upload_time',NULL,'id_template=1');
        $res = $db->getResult();

        if(count($res)==0){
            $db->insert('template_surat', array(
                'id_template'=>1,
                'nama_template'=>$uploadName,
                'source'=>$uploadDir,
                'upload_date'=>$uploadDate,
                'upload_time'=>$uploadTime
            ));
            $res = $db->getResult();
        }else{
            $db->update('template_surat', array(
                'id_template'=>1,
                'nama_template'=>$uploadName,
                'source'=>$uploadDir,
                'upload_date'=>$uploadDate,
                'upload_time'=>$uploadTime
            ),'id_template=1');
            $res = $db->getResult();
        }

        //move data from tmp to actual path
        $tmpFileDir = $file['tmp_name'];
        $newUploadDir = realpath('../../src/surat/');
        $newUploadDir = $newUploadDir.$uploadName;

        move_uploaded_file($tmpFileDir, $newUploadDir);
        header('Location: ../../index.php?pageid=template_surat');


    }

?>