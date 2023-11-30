<?php include("path.php");
include "app/controllers/posts.php";
$post = selectOne('posts', ['id' => $_GET['post']]);
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
        <div class="main-content col-md-9 col-12">
            <div class="single_post row">
                <div class="img col-12"><br><br><br>
                    <img src="<?=BASE_URL . 'assets/images/posts/' . $post['img'] ?>" alt="<?=$post['title']?>" class="img-thumbnail">
                </div>
                <h2><?php echo $post['title']; ?></h2>
                <div class="info">
                    <p> <?=$post['created_date'];?></p>
                </div>
                <div class="single_post_text col-12">
                    <?=$post['content'];?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("app/include/footer.php"); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>