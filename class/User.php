<?php

class User {

    public $id, $username, $password;

    /**
     * Authenticate a user
     * @param string $username Username
     * @param string $password Password
     * 
     * @return bool True if authenticate successful, NULL otherwise
     */
    public static function authenticate($conn, $username, $password){
        $sql = "SELECT * 
                FROM user
                WHERE username = :username;";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":username", $username, PDO::PARAM_STR);

        $stmt->setFetchMode(PDO::FETCH_CLASS, "User");

        $stmt->execute();

        $user = $stmt->fetch(); // mặc định trả về mảng, thêm setFetchMode để trả về Object

        if($user){
            return password_verify($password, $user->password);
        }
    }

}