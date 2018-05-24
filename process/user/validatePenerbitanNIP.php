<?php
    include_once('../../config/dbConfig.php');

    if(isset($_POST['nip'])&&!empty($_POST['nip'])){

        $db = new Database;
        $db->connect();

        $nip = $_POST['nip'];

        $db->select('pengajuan','nip',NULL,'nip="'.$nip.'"');

        $res = $db->numRows();

        echo $res;

    }
?>
