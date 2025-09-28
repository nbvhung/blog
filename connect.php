<?php
    $db_host = "localhost";
    $db_name = "my_blog";
    $db_user = "blog_db admin";
    $db_pass = "_YAde82QaT/ODqKw";

    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    if(mysqli_connect_error()){
        print mysqli_connect_error();
        exit;
    }


    // print "Connected successfully!";

    $sql = "SELECT * 
            FROM blogs
            ORDER BY Published_at DESC;
    ";
    $result = mysqli_query($conn, $sql); // Truy van
    if($result === false){
        print mysqli_error($conn);
    }
    else {
        $articles = mysqli_fetch_all($result, MYSQLI_ACCOC);
        print_r($articles);
    }
?>