<?php
    include_once '../../config/dbConfig.php';

    $db = new Database;
    $db->connect();


    if (isset($_GET['id']) && isset($_GET['nip'])) {

        switch ($_GET['get']) {
            case 'ktp':
                $id = $_GET['id'];
                $nip = $_GET['nip'];

                $db->select('pengajuan','ktp',NULL,'id='.$id.' AND nip='.$nip);
                $res = $db->getResult();
                $url = $res[0]['ktp'];
                $state = 1;
                break;
            case 'surat':
                $id = $_GET['id'];
                $nip = $_GET['nip'];

                $db->select('pengajuan','surat',NULL,'id='.$id.' AND nip='.$nip);
                $res = $db->getResult();
                $url = $res[0]['surat'];
                $state = 0;
                break;

            default:
                echo "noting to show";
                break;
        }

    }


?>

<body style="margin:0">

    <?php if ($state == 1): ?>
        <img src="../../<?php echo $url ?>">
    <?php else: ?>
        <object data="../../<?php echo $url ?>"  width="100%" height="100%"> </object>
    <?php endif; ?>

</body>
