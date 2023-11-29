<?php
    include "path.php";
    include "app/controllers/users.php";
?>
<html lang="ru">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>SmartTime</title>
</head>
<body>

<?php include("app/include/header.php"); ?>
<!-- END HEADER -->
<!-- FORM -->
<div class="container reg_form">
    <h2>Регистрация</h2>
    <form action="reg.php" method="post" class="row justify-content-center">
    
    <div>
        <i>
            <p class="err">
                <?= $errMsg ?>
            </p>
        </i>
    </div>

    <input name="login" class="inputline" type="text" maxlength="255" placeholder="Логин*" value="<?= $login ?>" required></br>
    <input name="surname" class="inputline" type="text" maxlength="255" placeholder="Фамилия*" value="<?= $surname ?>"
        required></br>
    <input name="name" class="inputline" type="text" maxlength="255" placeholder="Имя*" value="<?= $name ?>" required></br>
    
    <input name="password" class="inputline" type="password" maxlength="255" placeholder="Пароль*" required></br>
    <input name="password_repeat" class="inputline" type="password" maxlength="255" placeholder="Повторите пароль*"
        required></br>

    <div class="form-check">
        <input name="publish" class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" checked>
        <label class="form-check-label" for="flexCheckChecked">
        Я согласен с обработкой персональных данных
        </label>
    </div>

    <div class="w-100"></div>
    <div class="mb-3 col-12 col-md-4">
        <button type="submit" class="btn btn-secondary" name="button-reg">Регистрация</button>
        <a href="aut.html">Войти</a>
    </div>
    </form>
</div>
<?php include("app/include/footer.php"); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>