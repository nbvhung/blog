<?php
    function getDB(){
        $db_host = "localhost";
        $db_name = "my_blog";
        $db_user = "blog_db admin";
        $db_pass = "_YAde82QaT/ODqKw";

        $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

        if(mysqli_connect_error()){
            print mysqli_connect_error();
            exit;
        }

        return $conn;
    }
?>

<!-- binh luan
like
dn/ dk
token  -->