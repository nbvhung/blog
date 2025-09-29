<?php if (!empty($article->errors)): ?>
<div class="alert alert-danger">
    <ul class="mb-0">
        <?php foreach ($article->errors as $err): ?>
            <li><?= htmlspecialchars($err); ?></li>
        <?php endforeach; ?>
    </ul>
</div>
<?php endif; ?>

<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow-lg border-0">
        <div class="card-body p-4">

          <form method="post">
            
            <div class="mb-3">
              <label for="title" class="form-label">Title</label>
              <input 
                type="text" 
                class="form-control" 
                id="title" 
                name="Title" 
                value="<?= htmlspecialchars($article->Title); ?>" 
                placeholder="Article Title" 
                required>
            </div>

            
            <div class="mb-3">
              <label for="content" class="form-label">Content</label>
              <textarea 
                class="form-control" 
                id="content" 
                name="Content" 
                rows="6" 
                placeholder="Article Content" 
                required><?= htmlspecialchars($article->Content); ?></textarea>
            </div>

            
            <div class="mb-3">
              <label for="published_at" class="form-label">Published at</label>
              <input 
                type="datetime-local" 
                class="form-control" 
                id="published_at" 
                name="Published_at" 
                value="<?= htmlspecialchars($article->Published_at); ?>">
            </div>

            <div class="card-footer d-flex justify-content-end">
              <button type="submit" class="btn-one me-2">Save</button>
              <a href="myblog.php" class="btn-two">Cancel</a>
            </div>
          </form>
          
        </div>
      </div>
    </div>
  </div>
</div>
