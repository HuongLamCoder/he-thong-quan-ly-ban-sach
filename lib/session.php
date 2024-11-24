<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if(!isset($_SESSION)) {
        $_SESSION['user'] = ['id' => '', 'email' => '', 'fullname' => '', 'phanquyen' => ''];
    }
    function login_session($inputID, $inputEmail, $inputFullName, $phanquyen) {
        $_SESSION['user']['id'] = $inputID;
        $_SESSION['user']['email'] = $inputEmail;
        $_SESSION['user']['fullname'] = $inputFullName;
        $_SESSION['user']['phanquyen'] = $phanquyen;
    }

    function permission_session($permission){
        $_SESSION['user']['permission'] = $permission;
    }

    function login_session_setEmail($inputEmail) {
        $_SESSION['user']['email'] = $inputEmail;
    }

    function login_session_setFullName($inputFullName) {
        $_SESSION['user']['fullname'] = $inputFullName;
    }

    function login_session_unset() {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }
    }
?>