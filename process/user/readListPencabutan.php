<?php
    include_once('../../config/dbConfig.php');

    if(isset($_GET['id'])&&!empty($_GET['id'])){

        $db = new Database;
        $db->connect();
        $id = $_GET['id'];
        $db->select('pencabutan','id',NULL,'id='.$id);

        $res = $db->numRows();

        echo $res;

    }
?>
