<?php
$acl = require_once 'config/acl.php';
$pass = $_POST['pass'];
$name = $_POST['name'];



if($_POST) {
        if($pass !== '' && $name !== '') {
            if(checkUser($acl, $pass, $name)) {
                header('Location: user1.php');
            } else if(checkAdmin($acl, $pass, $name)) {
                header('Location: admin.php');
            } else {
                header('Location: index.php');
            }
        } else {
            echo 'Заполните данные!';
        }
    }

function checkUser(array $acl,string $pass,string $name): bool
{
    $userAcl = $acl['user'];

    if($userAcl['name'] === $name && $userAcl['password'] === $pass) {
        return true;
    }
    return false;

}

function checkAdmin(array $acl,string $pass,string $name): bool
{
    $adminAcl = $acl['admin'];
    if($adminAcl['name'] === $name && $adminAcl['pass'] === $pass) {
        return true;
    }
    return false;
}
