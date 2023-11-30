<?php include("path.php");
include "app/controllers/users.php";
$posts = selectAll('posts');
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>SmartTime</title>
</head>
<body>

<?php include("app/include/header.php"); ?>
<div class="container">
    <div class="content row">
        <div class="main-content col-md-9 col-12"><br><br><br>
            <div class="single_post row">
                <h2><b>Личный кабинет</b></h2>
                <div class="single_post_text col-12">
                    <p><?php echo $_SESSION['login']; ?></p>
                    <h3><?php echo $_SESSION['surname']; ?> <?php echo $_SESSION['name']; ?></h3>
                </div>
                <div style="height: 70px;"></div>

                <h2><b>Рекомендуемое:</b></h2>
                <div class="single_post_text col-12 row">
                    <?php
                    $i = 0;
                    foreach ($posts as $post) {
                        if ($i < 3) { ?>
                            <div class="col-4">
                                <a href="<?= BASE_URL . 'single.php?post=' . $post['id']; ?>">
                                    <div class="img_item slider_img">
                                        <img src="<?=BASE_URL . 'assets/images/posts/' . $post['img'] ?>" alt="<?=$post['title']?>" class="img-thumbnail">
                                    </div>
                                    <p class="title">
                                        <?= $post['title']; ?>
                                    </p>
                                </a>
                            </div>
                        <?php }
                        $i++;
                    } ?>
                </div>

            </div>
        </div>
    </div>
</div>
<?php include("app/include/footer.php"); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>