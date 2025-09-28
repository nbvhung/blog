<?php 
/**
 * Get article base on id
 *   @param object $conn Connection to DB
 *   @param int $id th article ID
 *  @return mixed An array contain article, null if not found
 */
    

    function getArticle($conn, $id){
        $sql = "SELECT * FROM blogs WHERE Id = ?";
        $stmt = mysqli_prepare($conn, $sql);

        if($stmt === false){
            print mysqli_error($conn);
        }

        else{
            mysqli_stmt_bind_param($stmt, "i", $id); // stmt, data_type, var

            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
                
                return mysqli_fetch_array($result, MYSQLI_ASSOC);
            }
        }
    }


    function validateArticle($title, $content, $published_at){
        $errors = [];

        if($title == ""){
            $errors[] = "Title is required";
        }

        if($content == ""){
            $errors[] = "Content is required";
        }

        if($published_at == ""){
            $errors[] = "Published_at is required";
        }

        return $errors;
    }

?>