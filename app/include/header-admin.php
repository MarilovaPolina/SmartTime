<header class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h1>
                    <a class="logotype" href="<?php echo BASE_URL ?>">SmartTime</a>
                </h1>
            </div>
            <nav class="col-8">
                <ul>
                    <li><a href="<?php echo BASE_URL ?>">Главная</a> </li>
                    <li>
                        <a class="korzina_li" href="#">
                            <?php echo $_SESSION['login']; ?>
                        </a>
                    </li>
                    <li>
                        <a class="korzina_li" href="<?php echo BASE_URL . "logout.php"; ?>">Выход</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
