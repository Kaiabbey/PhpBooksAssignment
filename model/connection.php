<?php
class connection{

    private $pdo;


    public function connectdb(){
        $dsn = 'mysql:dbname=bookswebsite;host=localhost;port=3306;';
        $user_name = 'root';
        $password = 'password1';
        try{
            $pdo = new pdo($dsn,$user_name,$password);
            return $pdo;
        }
        catch(PDOExecption $e){
            header('location:../index.php?msg=Database_err'.$e->getMessage());
        }
    }
}