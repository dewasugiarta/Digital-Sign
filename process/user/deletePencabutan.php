<?php
    include_once('../../config/dbConfig.php');

    if(isset($_POST['id_pencabutan'])&&!empty($_POST['id_pencabutan'])){
        $id= $_POST['id'];
        $id_pencabutan = $_POST['id_pencabutan'];

        $db = new Database;
        $db->connect();

        $db->update('pengajuan',array(
            'status'=>4,
            'status_pencabutan'=> 0
        ), 'id='.$id);
        $res = $db->getResult();

        $db->delete('pencabutan', 'id_pencabutan='.$id_pencabutan);
        $res2 = $db->getResult();

        echo json_encode($res2);
    }

?>
