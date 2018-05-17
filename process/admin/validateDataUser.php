<?php
    include_once('../../config/dbConfig.php');

    if(isset($_POST['id'])&&!empty($_POST['id'])){

        $db = new Database;
        $db->connect();

        $id = $_POST['id'];

        $db->select('user','iduser',NULL,'iduser="'.$id.'"');

        $res = $db->numRows();

        echo $res;



    }
?>
