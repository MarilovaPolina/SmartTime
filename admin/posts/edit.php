<?php

include "../../path.php";
include "../../app/controllers/posts.php";
?>
<!doctype html>
<html lang="ru">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <title>SmartTime</title>
</head>
<body>

<?php include("../../app/include/header-admin.php"); ?>

<div class="container">

    <div class="posts col-9">
        <div class="row title-table">
            <h2>Редактирование записи</h2>
        </div>
        <div class="row add-post">
            <div class="mb-12 col-12 col-md-12 err">
                <!-- Вывод массива с ошибками -->
                <?php include "../../app/helps/errorInfo.php"; ?>
            </div>
            <form action="edit.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?=$id; ?>">
                <div class="col mb-4">
                    <input value="<?=$post['title']; ?>" name="title" type="text" class="form-control" placeholder="Title" aria-label="Название статьи">
                </div>
                <div class="col">
                    <label for="editor" class="form-label">Содержимое записи</label>
                    <textarea name="content" id="editor" class="form-control" rows="6"><?=$post['content']; ?></textarea>
                </div>
                <div class="input-group col mb-4 mt-4">
                    <input name="img" type="file" class="form-control" id="inputGroupFile02">
                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                </div>
                <div class="form-check">
                    <?php if (empty($publish) && $publish == 0): ?>
                        <input name="publish" class="form-check-input" type="checkbox" id="flexCheckChecked">
                        <label class="form-check-label" for="flexCheckChecked">
                            Publish
                        </label>
                    <?php else: ?>
                        <input name="publish" class="form-check-input" type="checkbox" id="flexCheckChecked" checked>
                        <label class="form-check-label" for="flexCheckChecked">
                            Publish
                        </label>
                    <?php endif; ?>
                </div>
                <div class="col col-6">
                    <button name="edit_post" class="btn btn-primary" type="submit">Сохранить запись</button>
                </div>
            </form>
        </div>

    </div>
</div>
</div>
<?php include("../../app/include/footer.php"); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>
