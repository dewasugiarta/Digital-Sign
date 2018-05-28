<?php
    include_once('../../config/dbConfig.php');

    if(isset($_POST['id'])&&!empty($_POST['id'])){

        $db = new Database;
        $db->connect();

        $id = $_POST['id'];

        $db->delete('pengajuan', 'id='.$id);

        $res = $db->getResult();

        echo json_encode($res);

    }

?>