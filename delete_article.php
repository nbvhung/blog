<?php
    require "./includes/db.php";
    require "./includes/article.php";

    $conn = getDB();

    if(isset($_GET["id"])){
        $article = getArticle($conn, $_GET["id"]);

        if($article){
            $id = $_GET["id"];
        }
        else{
            die("article not found");
        }
    }
    else {
        die("id not supplied, article not found");
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $sql = "DELETE FROM blogs WHERE Id=?;";
        
        $stmt = mysqli_prepare($conn, $sql);

        if($stmt == false){
            print mysqli_error($conn);
        }
        else{
            mysqli_stmt_bind_param($stmt, "i", $id);

            if(mysqli_stmt_execute($stmt)){
                header("Location: myblog.php");
                exit;
            }
            else{
                print mysqli_error($conn);
            }
        }
    }
?>