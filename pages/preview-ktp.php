<?php

    if(isset($_GET['id'])){

        $id = $_GET['id'];
        include_once('../config/dbConfig.php');
        $db = new Database;
        $db->connect();

        $db->select('pengajuan','ktp,nama',NULL, 'id='.$id);
        $res = $db->getResult();

        $data = $res[0];
        $src = substr($data['ktp'],3);
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="https://denpasarkota.go.id/assets/templates/default/ico/favicon.png">
    <title>
        <?php echo 'KTP - '.$data['nama'];?>
    </title>
</head>
<body>

    
   <?php
        echo '<img src="'.$src.'" alt="ktp" width="auto" height="90%">';
   ?>
</body>
</html>