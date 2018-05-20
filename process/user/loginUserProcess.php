<?php
    session_start();
    if(!$_POST['login']){
        include_once "../../config/dbConfig.php";

        $db = new Database();//make object DB
        $db->connect();//connect to dataBase

        $username = $_POST['username'];
        $password = $_POST['password'];
        $password = $db->escapeString($password);
        //option for bcrypt
        // $options = [
        //     'cost' => 12,
        //     'salt' => uniqid(mt_rand(),true)
        // ];
        // $hash_pass =  password_hash($password, PASSWORD_BCRYPT, $options);
        // echo "$hash_pass";
        // echo "<br>";


        $db->select('user','username,password',null,'username="'.$username.'"'); // Table name, Column Names, WHERE conditions
        $res = $db->getResult();

        foreach($res as $result) {
            $hash = $result['password'];
        }
        // echo $hash;
        // echo $password;
        // if(password_verify($password, $hash)){
        //     echo "success";
        // }else {
        //     echo "fail";
        // }

        //verify password
        if (password_verify($password, $hash)) {
            $_SESSION['loginState'] = 'user';
            header('Location: ../../index.php?pageid=userDash');
        } else {
            echo "  <script type='text/javascript'>alert('Wrong Username or Password');
                        window.location='../../loginUser.php';
                    </script>";
            $db->disconnect();
        }
    }else {
        header("location: ../loginUser.php");
    }

?>
