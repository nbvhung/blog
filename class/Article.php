<?php

class Article {

    public $Id, $Title, $Content, $Published_at;
    public $errors = [];

    public static function getAll($conn) {
        $sql = "SELECT * FROM blogs";

        $results = $conn->query($sql);

        return $results->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
    * Get article base on id
    *   @param object $conn Connection to DB
    *   @param int $id th article ID
    *   @return mixed An array contain article, null if not found
    */
    
    public static function getById($conn, $id){
        $sql = "SELECT * FROM blogs WHERE id = :id";
        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        $stmt->setFetchMode(PDO::FETCH_CLASS, "Article");

        if($stmt->execute()){
            return $stmt->fetch();
        }
    }

    public function update($conn) {
        if($this->validate()){
            $sql = "UPDATE blogs 
                    SET Title=:title, Content=:content, Published_at=:published_at
                    WHERE Id=:id;";
            
            $stmt = $conn->prepare($sql);

            $stmt->bindValue(':title', $this->Title, PDO::PARAM_STR);
            $stmt->bindValue(':content', $this->Content, PDO::PARAM_STR);
            $stmt->bindValue(':published_at', $this->Published_at, PDO::PARAM_STR);
            $stmt->bindValue(':id', $this->Id, PDO::PARAM_INT);

            return $stmt->execute();
        }
        else{
            return false;
        }
        
    }

    protected function validate(){

        if($this->Title == ""){
            $this->errors[] = "Title is required";
        }

        if($this->Content == ""){
            $this->errors[] = "Content is required";
        }

        if($this->Published_at == ""){
            $this->errors[] = "Published_at is required";
        } else {
            $this->Published_at = date("Y-m-d H:i:s", strtotime($article->Published_at));
        }

        return empty($this->errors);
    }

    
    public function delete($conn){
        $sql = "DELETE FROM blogs WHERE Id=:id;";
        
        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':id', $this->Id, PDO::PARAM_INT);

        return $stmt->execute();
    }


    public function create($conn) {
        if($this->validate()){
            $sql = "INSERT INTO blogs(Title, Content, Published_at)
                    VALUES (:title, :content, :published_at);";
            
            $stmt = $conn->prepare($sql);

            $stmt->bindValue(':title', $this->Title, PDO::PARAM_STR);
            $stmt->bindValue(':content', $this->Content, PDO::PARAM_STR);
            $stmt->bindValue(':published_at', $this->Published_at, PDO::PARAM_STR);

            return $stmt->execute();
        }
        else{
            return false;
        }
    }

}