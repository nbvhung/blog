<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
</head> 

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="myblog.php">My Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNav">
        <ul class="navbar-nav ms-auto me-3">
            <li class="nav-item"><a class="nav-link" href="../../crud-php/myblog.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="#">About</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Services</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Blog</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
        </ul>
        <form class="d-flex me-2">
            <input class="form-control form-control-sm me-2" type="search" placeholder="Search">
            <button class="btn btn-outline-light btn-sm" type="submit">Search</button>
        </form>
        <a href="../../crud-php/new_article.php" class="btn btn-warning btn-sm">+ New Post</a>
        </div>
    </div>
    </nav>

    <section class="hero">
        <div class="container text-center text-white">
            <h1>Kho bài viết hay</h1>
            <p>Cập nhật liên tục các tin tức nóng hổi</p>
        </div>
    </section>

    <main class="container">