<?php 
    require "./includes/db.php";
    require "./includes/article.php";

    $errors = [];
    $title = "";
    $content = "";
    $published_at = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $title = $_POST["Title"];
        $content = $_POST["Content"];
        $published_at = $_POST["Published_at"];
        
        $errors = validateArticle($title, $content, $published_at);

        if(empty($errors)){
            $conn = getDB();

            $datetime = date("Y-m-d H:i:s", strtotime($published_at)); // format lại định dạng ngày tháng cho gióng trong sql
            $sql = "INSERT INTO blogs(Title, Content, Published_at)
                    VALUES (?, ?, ?);";

            $stmt = mysqli_prepare($conn, $sql);

            if($stmt === false){
                print mysqli_error($conn);
            }

            else{
                mysqli_stmt_bind_param($stmt, "sss", $title, $content, $datetime);

                if(mysqli_stmt_execute($stmt)){
                    $id = mysqli_insert_id($conn);
                    header("Location: article.php?id=$id");
                }
                else {
                    print mysqli_error($conn);
                }
            }
        }
    }
?>

<?php require "./includes/header.php"; ?>

<h2>New Article</h2>

<?php require "./includes/form.article.php"; ?>
<?php require "./includes/footer.php"; ?>