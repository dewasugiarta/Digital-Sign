<?php
include_once('../../config/dbConfig.php');

$db = new Database;
$db->connect();

    if(isset($_POST['submit'])){
        $nama = validateUser('addNama');
        $nip = validateUser('addNIP');
        $nik = validateUser('addNIK');
        $pangkat = validateUser('addPangkat');
        $jabatan = validateUser('addJabatan');
        $instansi = validateUser('addInstansi');
        $username = validateUser('addUsername');
        $email = validateUser('addEmail');
        $idOpd = validateUser('addOPD');
        $telepon = validateUser('addTelepon');
        $password = $_POST['addTelepon'];
        $password = $db->escapeString($username);
        $password = getPassword($password);
        $emailUser = $db->escapeString($email);
        // $hash = '$2y$12$huXY8xhpojeCY038m5odKuq.JtSpqbpxEbbCoxzR8sk9PAb4uRzzu';
        // if(password_verify($telepon, $hash)){
        //     echo "good";
        // }else{
        //     echo "bad";
        // }
        $db->insert('user',array(
            'nama'=>$nama,
            'iduser'=>$nip,
            'nik'=>$nik,
            'pangkat_golongan'=>$pangkat,
            'jabatan'=>$jabatan,
            'instansi'=>$instansi,
            'username'=>$username,
            'email'=>$email,
            'id_opd'=>$idOpd,
            'telepon'=>$telepon,
            'password'=>$password
        ));

        $res = $db->getResult();
        if($res){
            echo "<script>alert('Success!')</script>";
            header('Location: ../../index.php?pageid=admUser');
        }
    }

    function validateUser($x){
        if(isset($_POST[$x])&&!empty($_POST[$x])) return $_POST[$x];
        else return '';
    }

    function getPassword($pass){
        $options = [
            'cost' => 12,
            'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
        ];
        $hash_pass =  password_hash($pass, PASSWORD_BCRYPT, $options);
        return $hash_pass;
    }

?>
