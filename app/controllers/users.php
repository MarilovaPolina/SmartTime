<?php
include SITE_ROOT . "/app/database/db.php";
$errMsg='';

//Функция авторизации пользователя
function userAuth($user){
    $_SESSION['id'] = $user['id'];
    $_SESSION['login'] = $user['login'];
    $_SESSION['admin'] = $user['admin'];
    $_SESSION['name'] = $user['name'];
    $_SESSION['surname'] = $user['surname'];
    if($_SESSION['admin']){
        header('location: ' . BASE_URL . "admin/posts/index.php");
    }else{
        header('location: ' . BASE_URL);
    }
}

$users = selectAll('users');

// Регистрация нового пользователя
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
        $errMsg='Логин должен быль больше 3 символов';
    }elseif($pass1 !== $pass2){
        $errMsg='Пароли не сопадают';
    }else{
        $existence = selectOne('users', ['login' => $login]);
        if($existence['login'] === $login){
            array_push($errMsg, "Пользователь с такой почтой уже существует");
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

// Авторизация пользователя и проверка введенных данных
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-log'])){

    $login = trim($_POST['login']);
    $pass = trim($_POST['password']);

    if($login === '' || $pass === '') {
        $errMsg="Не все поля заполнены";
    }else{       
        $existence = selectOne('users', ['login' => $login]);

        if($existence && password_verify($pass, $existence['password'])){
            userAuth($existence);
        }else{
            $errMsg="Пароль или логин введены не верно";
        }

    }
}else{
    $login = '';
}
