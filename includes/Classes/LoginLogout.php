<?php


class LoginLogout
{
    private $login;
    private $pass;
    public function __construct() {
        $loginInfo = include(ROOT . '/includes/dates/admin.php');
        $this->login = $loginInfo['login'];
        $this->pass  = $loginInfo['pass'];
    }
    public function logIn() {
        require ROOT . '/views/login.php';
    }
    public function doLogin() {
        if($_POST['login'] == $this->login && md5($_POST['password']) == $this->pass) {
            $_SESSION['ADMIN'] = true;
            header('Location: .');
        } else {
            header('Location: ?action=login');
        }
    }
    public function logOut() {
        unset($_SESSION['ADMIN']);
        header('Location: .');
    }
}