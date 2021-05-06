<?php
include "../model/connection.php";
include "../model/books.php";
extract($_POST);
$conn = new connection;
$pdo = $conn->connectdb();
$book = new book;
try{
    if(isset($_FILES['BookCover'])){
        $ImageName = date("Y:m:d:h:i:s").$_FILES["BookCover"]["name"];
        $ImagePath = "../view/img/".$ImageName;
        move_uploaded_file($_FILES["BookCover"]["tmp_name"],$ImagePath);
        $BookCover ="http://localhost:3306/PhpBooksAssignment/view/img/".$ImageName;
    }
    else{
        $BookCover = "http://localhost:3306/PhpBooksAssignment/view/img/fee.jpg";
    }
    $book->getBook($AuthorID,$BookCover,$BookTitle,$CopiesSold,$PublishYear);
    $book->addBook($pdo);
    header("location:../view/addbook.php?BookAdded");
}catch(exception $e){
    header("location:../addbook.php?msg=".$e->getMessage());
}
