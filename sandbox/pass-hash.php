<?php


$pass = 'sukma';
$options = array(
    'cost'=>12,
    'salt'=>uniqid(mt_rand(), true)
);

$newPass = password_hash($pass, PASSWORD_BCRYPT, $options);
echo $newPass;