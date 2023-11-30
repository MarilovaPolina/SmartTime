<?php
include "../../path.php";
include "../../app/controllers/posts.php";
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <title>SmartTime</title>
</head>

<body>

    <?php include("../../app/include/header-admin.php"); ?>

    <div class="container">

        <div class="posts">
            <div class="button">
                <a href="<?php echo BASE_URL . "admin/posts/create.php"; ?>" class="col-2 btn btn-success">Создать</a>
            </div>

            <div class="row title-table">
                <h2>Товары</h2>
                <div class="w-100"></div>
                <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Товар</th>
                            <th scope="col">Дата создания</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <?php foreach ($allposts as $key => $post): ?>
                        <tbody>
                            <tr>
                                <th scope="row">
                                    <?= $key + 1; ?>
                                </th>
                                <td>
                                    <?= $post['title']; ?>
                                </td>
                                <td>
                                    <?= $post['created_date']; ?>
                                </td>
                                <td><a class="del" href="../../del.php?delete_id=<?= $post['id']; ?>">Удалить</a></td>
                            </tr>
                        </tbody>
                    <?php endforeach; ?>
                </table>

            </div>
        </div>
    </div>

    <?php include("../../app/include/footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
        crossorigin="anonymous"></script>
</body>

</html>