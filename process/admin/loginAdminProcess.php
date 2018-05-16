<?php
    if(!$_POST['login']){
        include_once "../../config/dbConfig.php";

        $db = new Database();//make object DB
        $db->connect();//connect to dataBase

        $username = $_POST['username'];
        $password = $_POST['password'];
        $password = $db->escapeString($password);
        //option for bcrypt
        $options = [
            'cost' => 12,
        ];
        // $hash_pass =  password_hash($password, PASSWORD_BCRYPT, $options);
        // echo "$hash_pass";
        // echo "<br>";


        $db->select('admin','username,password',null,'username="'.$username.'"'); // Table name, Column Names, WHERE conditions
        $res = $db->getResult();

        foreach($res as $result) {
            $hash = $result['password'];
        }
        //verify password
        if (password_verify($password, $hash)) {
            $_SESSION['loginState'] = 'admin';
            header('Location: ../../index.php?pageid=admDash');
        } else {
            echo "  <script type='text/javascript'>alert('Wrong Username or Password');
                        window.location='../../loginAdmin.php';
                    </script>";
            $db->disconnect();
        }
    }else {
        header("location: ../loginAdmin.php");
    }

?>
