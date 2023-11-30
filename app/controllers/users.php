<?php
include SITE_ROOT . "/app/database/db.php";
$errMsg='';

function userAuth($user){
    $_SESSION['id'] = $user['id'];
    $_SESSION['login'] = $user['login'];
    $_SESSION['admin'] = $user['admin'];
    $_SESSION['name'] = $user['name'];
    $_SESSION['surname'] = $user['surname'];
    if($_SESSION['admin']){
        echo "Авторизован";
        //header('location: ' . BASE_URL . "admin/posts/index.php");
    }else{
        header('location: ' . BASE_URL);
    }
}

$users = selectAll('users');

// Код для формы регистрации
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-reg'])){

    $admin = 0;
    $surname=trim($_POST['surname']);
    $name=trim($_POST['name']);
    $login=trim($_POST['login']);
    $pass1=trim($_POST['password']);
    $pass2=trim($_POST['password_repeat']);

    if($surname === '' || $name === '' || $login === '' || $pass1 === '' || $pass2 === ''){
        $errMsg='Заполните все поля';
    }elseif(mb_strlen($login, 'UTF8')<3){
        $errMsg='Логин должен содержать более 3 символов';
    }elseif($pass1 !== $pass2){
        $errMsg='Пароли не сопадают';
    }else{
        $existence = selectOne('users', ['login' => $login]);
        if($existence['login'] === $login){
            array_push($errMsg, "Пользователь с такой почтой уже зарегистрирован!");
        }else{
            $pass = password_hash($pass1, PASSWORD_DEFAULT);
            $post = [
                'admin' => $admin,
                'name' => $name,
                'surname' =>$surname,
                'login' => $login,
                'password' => $pass
            ];
            $id = insert('users', $post);
            $user = selectOne('users', ['id' => $id] );
            userAuth($user);
        }
    }
}else{
    $surname='';
    $name='';
    $login='';
}

// Код для формы авторизации
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-log'])){

    $login = trim($_POST['login']);
    $pass = trim($_POST['password']);

    if($login === '' || $pass === '') {
        $errMsg="Не все поля заполнены!";
    }else{       
        $existence = selectOne('users', ['login' => $login]);

        if($existence && password_verify($pass, $existence['password'])){
            userAuth($existence);
        }else{
            $errMsg=$pass;
        }

    }
}else{
    $login = '';
}
/*
// Код добавления пользователя в админке
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create-user'])){


    $admin = 0;
    $login = trim($_POST['login']);
    $email = trim($_POST['mail']);
    $passF = trim($_POST['pass-first']);
    $passS = trim($_POST['pass-second']);

    if($login === '' || $email === '' || $passF === ''){
        array_push($errMsg, "Не все поля заполнены!");
    }elseif (mb_strlen($login, 'UTF8') < 2){
        array_push($errMsg, "Логин должен быть более 2-х символов");
    }elseif ($passF !== $passS) {
        array_push($errMsg, "Пароли в обеих полях должны соответствовать!");
    }else{
        $existence = selectOne('users', ['email' => $email]);
        if($existence['email'] === $email){
            array_push($errMsg, "Пользователь с такой почтой уже зарегистрирован!");
        }else{
            $pass = password_hash($passF, PASSWORD_DEFAULT);
            if (isset($_POST['admin'])) $admin = 1;
            $user = [
                'admin' => $admin,
                'username' => $login,
                'email' => $email,
                'password' => $pass
            ];
            $id = insert('users', $user);
            $user = selectOne('users', ['id' => $id] );
            userAuth($user);
        }
    }
}else{
    $login = '';
    $email = '';
}

// Код удаления пользователя в админке
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
    delete('users', $id);
    header('location: ' . BASE_URL . 'admin/users/index.php');
}

// РЕДАКТИРОВАНИЕ ПОЛЬЗОВАТЕЛЯ ЧЕРЕЗ АДМИНКУ
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['edit_id'])){
    $user = selectOne('users', ['id' => $_GET['edit_id']]);

    $id =  $user['id'];
    $admin =  $user['admin'];
    $username = $user['username'];
    $email = $user['email'];
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update-user'])){

    $id = $_POST['id'];
    $mail = trim($_POST['mail']);
    $login = trim($_POST['login']);
    $passF = trim($_POST['pass-first']);
    $passS = trim($_POST['pass-second']);
    $admin = isset($_POST['admin']) ? 1 : 0;

    if($login === ''){
        array_push($errMsg, "Не все поля заполнены!");
    }elseif (mb_strlen($login, 'UTF8') < 2){
        array_push($errMsg, "Логин должен быть более 2-х символов");
    }elseif ($passF !== $passS) {
        array_push($errMsg, "Пароли в обеих полях должны соответствовать!");
    }else{
        $pass = password_hash($passF, PASSWORD_DEFAULT);
        if (isset($_POST['admin'])) $admin = 1;
        $user = [
            'admin' => $admin,
            'username' => $login,
//            'email' => $mail,
            'password' => $pass
        ];

        $user = update('users', $id, $user);
        header('location: ' . BASE_URL . 'admin/users/index.php');
    }
}else{
    $id =  $user['id'];
    $admin =  $user['admin'];
    $username = $user['username'];
    $email = $user['email'];
}
*/
//if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['pub_id'])){
//    $id = $_GET['pub_id'];
//    $publish = $_GET['publish'];
//
//    $postId = update('posts', $id, ['status' => $publish]);
//
//    header('location: ' . BASE_URL . 'admin/posts/index.php');
//    exit();
//}