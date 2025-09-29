<?php 

class Database {

    public function getConn() {
        $db_host = "localhost";
        $db_name = "my_blog";
        $db_user = "blog_db_admin";
        $db_pass = "_YAde82QaT/ODqKw";

        $dsn = "mysql:host=$db_host;dbname=$db_name;charset=utf8";

        try {
            $db = new PDO($dsn, $db_user, $db_pass);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           
            return $db;
        } catch (PDOExeption $e) {
            echo $e->getMessage();
            exit;
        }   
    }
    
}