<?php
    require "./includes/init.php";

    $db = new Database();
    $conn = $db->getConn();

    if(isset($_GET["id"])){
        $article = Article::getById($conn, $_GET["id"]);
    }
    else {
        $article = null;
    }
?>


<?php require "./includes/header.php"; ?>
    <?php if($article): ?>
        <article>
            <h2><?= $article->Title?></h2>
            <p><?= $article->Content?></p>
        </article>
    <?php else: ?>
        <p>Article not found.</p>
    <?php endif?>
<?php require "./includes/footer.php"; ?>