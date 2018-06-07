<?php

    if(isset($_GET['id'])){

        $id = $_GET['id'];
        include_once('../config/dbConfig.php');
        $db = new Database;
        $db->connect();

        $db->select('pengajuan','surat,nama',NULL, 'id='.$id);
        $res = $db->getResult();

        $data = $res[0];
        $src = "../".$data['surat'];
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="https://denpasarkota.go.id/assets/templates/default/ico/favicon.png">
    <title>
        <?php echo 'Surat - '.$data['nama'];?>
    </title>
    <style>
        body{
            margin:0;
        }
    </style>
</head>
<body>

    
   <?php
        // echo '<img src="'.$src.'" alt="ktp" width="auto" height="90%">';
        echo '<object width="100%" height="100%" data="'.$src.'"></object>';
        
   ?>
</body>
</html>