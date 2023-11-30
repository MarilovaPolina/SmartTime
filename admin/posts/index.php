<?php
    include "../../path.php";
    include "../../app/controllers/posts.php";
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <title>SmartTime</title>
</head>
<body>

<?php include("../../app/include/header-admin.php"); ?>

<div class="container">

        <div class="posts">
            <div class="button">
                <a href="<?php echo BASE_URL . "admin/posts/create.php";?>" class="col-2 btn btn-success">Создать</a>
            </div>
            <div class="row title-table">
                <h2>Управление записями</h2>
                <div class="mb-12 col-12 col-md-12 err">
                    <p><?=$_SESSION['error'];?></p>
                </div>
                <div class="col-1">ID</div>
                <div class="col-5">Название</div>
                <div class="col-2">Автор</div>
                <div class="col-4">Управление</div>
            </div>
            <?php foreach ($postsAdm as $key => $post): ?>
                <div class="row post">
                    <div class="id col-1"><?=$key + 1; ?></div>
                    <div class="title col-5"><?=mb_substr($post['title'], 0, 50, 'UTF-8'). '...'  ?></div>
                    <div class="author col-2"><?=$post['username']; ?></div>
                    <div class="red col-1"><a href="edit.php?id=<?=$post['id'];?>">edit</a></div>
                    <div class="del col-1"><a href="edit.php?delete_id=<?=$post['id'];?>">delete</a></div>
                    <?php if ($post['status']): ?>
                        <div class="status col-2"><a href="edit.php?publish=0&pub_id=<?=$post['id'];?>">unpublish</a></div>
                    <?php else: ?>
                        <div class="status col-2"><a href="edit.php?publish=1&pub_id=<?=$post['id'];?>">publish</a></div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php include("../../app/include/footer.php"); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>
