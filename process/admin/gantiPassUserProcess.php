<?php
    include_once '../../config/dbConfig.php';
    $db = new Database;
    $db->connect();

    if(isset($_POST['updatePass'])){
        $iduser = $_POST['iduser'];
        $password = $_POST['newPass'];
        $password = $db->escapeString($password);
        $password = getPassword($password);
        // $db->select('user','password',null,'iduser="'.$iduser.'"'); // Table name, Column Names, WHERE conditions
        // $res = $db->getResult();
        //
        // foreach($res as $result) {
        //     $hash = $result['password'];
        //     echo "$hash";
        // }
        // if(password_verify($password, $hash)){
        //     echo "success";
        // }else {
        //     echo "fail";
        // }
        $db->update('user',array(
            'password'=>$password
        ), 'iduser="'.$iduser.'"');

        $res = $db->getResult();
        if($res){
            echo "<script>
                    alert('Rubah Password Sukses');location.href='../../index.php?pageid=admUser';
                </script>";
        }else{
            echo "<script>
                alert('Gagal Merubah Password');location.href='../../index.php?pageid=admUser';
                </script>
            ";
        }
    }

    function getPassword($pass){

        $options = [
            'cost' => 12,
            'salt' => uniqid(mt_rand(),true)
        ];
        $hash_pass =  password_hash($pass, PASSWORD_BCRYPT, $options);
        return $hash_pass;
    }

?>
