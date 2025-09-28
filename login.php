<?php
    session_start();

    // $_SESSION['logged_in'] = true;

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if($_POST["username"] == "nbvhung" && $_POST["password"]){
            session_regenerate_id(true); // tao secssion moi khi login tranh xss
            $_SESSION['logged_in'] = true;
            header("Location: myblog.php");
        }
        else{
            $error = "Loggin incorrect";
        }
    }
?>

<?php require "./includes/header.php" ?>

<h2>Đăng nhập</h2>

<?php if(!empty($error)): ?>
    <?= $error; ?>
<?php endif; ?>

<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-lg border-0">
            <div class="card-body p-4">

                <form method="post">

                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="username" 
                            name="username"  
                            required
                        >
                    </div>


                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="password" 
                            name="password"  
                            required
                        >
                    </div>
                    
                    <div class="card-footer d-flex justify-content-end">
                        <button type="submit" class="btn-one me-2">Login</button>
                        <a href="myblog.php" class="btn-two">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require "./includes/footer.php" ?>