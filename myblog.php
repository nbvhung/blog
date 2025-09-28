<?php
    require "./includes/db.php";
    require "./includes/auth.php";

    session_start();

    $conn = getDB();

    $sql = "SELECT * FROM blogs";

    $result = mysqli_query($conn, $sql);
    if($result){
        $articles = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    else{
        print mysqli_error($conn);
    }
?>


<?php require "./includes/header.php"; ?>

<?php if(isLoggedIn()): ?>
  <a href="logout.php">Logout</a>
<?php else: ?>
  <a href="login.php">Login</a>
<?php endif; ?>


<?php if(empty($articles)): ?>
  <div class="alert alert-warning">No articles found.</div>
<?php else: ?>
  <div class="row">
    <?php foreach($articles as $article): ?>
      <div class="col-md-6 col-lg-4 mb-4">
        <div class="card article-card h-100 shadow-sm border-0">
            <div class="card-header">
                <h5 class="card-title">
                    <a href="./article.php?id=<?= $article["id"]; ?>" class="text-decoration-none text-dark fw-bold">
                        <?= htmlspecialchars($article["Title"]); ?>
                    </a>
                </h5>
            </div>
            <div class="card-body">
                <p class="card-text text-muted">
                    <?= substr(htmlspecialchars($article["Content"]), 0, 120) . '...'; ?>
                </p>
            </div>
            <div class="card-footer bg-white border-0">
                <a href="./article.php?id=<?= $article["id"]; ?>" class="btn btn-sm btn-one">Đọc tiếp</a>
                <a href="./edit_article.php?id=<?= $article["id"]; ?>" class="btn btn-sm btn-one">Chỉnh sửa</a>
                <form action="./delete_article.php?id=<?= $article["id"]; ?>" class="form-group" method="post">
                  <button type="button" class="btn btn-sm btn-one delete-btn">Xóa</button>
                </form>
            </div>
        </div>
      </div>
    <?php endforeach ?>

    <div id="confirmModal" class="modal-form">
      <div class="modal-content">
        <h5>Bạn có chắc chắn muốn xóa bài viết này?</h5>
        <div class="modal-actions card-footer">
          <button id="confirmYes" class="btn btn-sm btn-one">Xóa</button>
          <button id="confirmNo" class="btn btn-sm btn-two">Hủy</button>
        </div>
      </div>
    </div>

  </div>
<?php endif ?>

<?php require "./includes/footer.php"; ?>
 