<?php


$pass = 'stikombali';
$options = array(
    'cost'=>12,
    'salt'=>uniqid(mt_rand(), true)
);

$newPass = password_hash($pass, PASSWORD_BCRYPT, $options);
var_dump($newPass);

echo password_verify('stikombali', $newPass)?"success":"failed";