<?php
    require "./includes/init.php";

    // $_SESSION['logged_in'] = true;

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $conn = require "./includes/db.php";

        if(User::authenticate($conn, $_POST["username"], $_POST["password"])){
            Auth::login();
            header("Location: index.php");
        }
        else{
            $error = "Login incorrect";
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
                            type="password" 
                            class="form-control" 
                            id="password" 
                            name="password"  
                            required
                        >
                    </div>
                    
                    <div class="card-footer d-flex justify-content-end">
                        <button type="submit" class="btn-one me-2">Login</button>
                        <a href="index.php" class="btn-two">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require "./includes/footer.php" ?>