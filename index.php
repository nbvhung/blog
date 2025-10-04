<?php
    require "./includes/init.php";

    $conn = require "./includes/db.php";

    $page = isset($_GET["page"]) ? $_GET["page"] : 1;
    // $page = $_GET["page"] ?? 1;
    $article = 6;

    $total_articles = Article::getTotal($conn);

    $paging = new Paging($page, $article, $total_articles);

    $total_pages = ceil($total_articles / $paging->limit);

    $articles = Article::getPage($conn, $paging->limit, $paging->offset);
?>


<?php require "./includes/header.php"; ?>

<?php if(Auth::isLoggedIn()): ?>
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
                    <a href="./article.php?id=<?= $article["Id"]; ?>" class="text-decoration-none text-dark fw-bold">
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
                <a href="./article.php?id=<?= $article["Id"]; ?>" class="btn btn-sm btn-one">Đọc tiếp</a>
                <a href="./edit_article.php?id=<?= $article["Id"]; ?>" class="btn btn-sm btn-one">Chỉnh sửa</a>
                <form action="./delete_article.php?id=<?= $article["Id"]; ?>" class="form-group" method="post">
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

    <nav aria-label="Page navigation">
      <ul class="pagination justify-content-center mt-4">

        <!-- Previous -->
        <?php if ($page > 1): ?>
          <li class="page-item">
            <a class="page-link" href="?page=<?= $paging->previous ?>">Previous</a>
          </li>
        <?php endif; ?>

        <!-- Các số trang -->
        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
          <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
            <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
          </li>
        <?php endfor; ?>

        <!-- Next -->
        <?php if ($page < $total_pages): ?>
          <li class="page-item">
            <a class="page-link" href="?page=<?= $paging->next ?>">Next</a>
          </li>
        <?php endif; ?>

      </ul>
    </nav>

  </div>
<?php endif ?>

<?php require "./includes/footer.php"; ?>
 