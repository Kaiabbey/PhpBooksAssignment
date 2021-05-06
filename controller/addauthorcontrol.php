<?php
include "../model/connection.php";
include "../model/authors.php";
extract($_POST);
$conn = new connection;
$pdo = $conn->connectdb();
$auth = new author;
try{
    $auth->getAuthorInfo($AuthorFirstName,$AuthorLastName);
    $auth->addAuthor($pdo);
    header("location:../view/addauthor.php?AuthorAdded");
}catch(exception $e){
    header("location:../addauthor.php?msg=".$e->getMessage());
}
