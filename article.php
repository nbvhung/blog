<?php
    require "./includes/db.php";
    require "./includes/article.php";

    $conn = getDB();

    if(isset($_GET["id"])){
        $article = getArticle($conn, $_GET["id"]);
    }
    else {
        $article = null;
    }
?>


<?php require "./includes/header.php"; ?>
    <?php if($article === null): ?>
        <p>Article not found.</p>
    <?php else: ?>
        <article>
            <h2><?= $article["Title"]?></h2>
            <p><?= $article["Content"]?></p>
        </article>
    <?php endif?>
<?php require "./includes/footer.php"; ?>