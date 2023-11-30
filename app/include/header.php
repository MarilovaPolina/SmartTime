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
                    <li><a href="<?php echo BASE_URL ?>">Товары</a> </li>
                    <li><a href="<?php echo BASE_URL ?>">О нас</a> </li>

                    <?php if (isset($_SESSION['id'])): ?>
                        <li><a class="korzina_li"  href="<?php echo BASE_URL ?>">Корзина</a> </li>
                    <?php endif; ?>

                    <li>
                        <?php if (isset($_SESSION['id'])): ?>
                            <a class="korzina_li" href="cabinet.php">
                                ЛК[
                                <?php echo $_SESSION['login']; ?>
                                ]
                            </a>

                            <?php if ($_SESSION['admin']): ?>
                                <li><a class="korzina_li" href="admin/posts/index.php">Админ панель</a> </li>
                            <?php endif; ?>
                            <li><a class="korzina_li" href="<?php echo BASE_URL . "logout.php"; ?>">Выход</a> </li>

                        <?php else: ?>
                            <a href="<?php echo BASE_URL . "log.php"; ?>">
                                Вход/Регистрация
                            </a>

                        <?php endif; ?>

                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
