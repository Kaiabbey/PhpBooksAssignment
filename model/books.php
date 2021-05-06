<?php
class book{


  private $AuthorID;
  private $BookTitle;
  private $BookCover;
  private $CopiesSold;
  private $PublishYear;
  


  public function getBook($AID,$BC,$BT,$CS,$PY){
      $this->AuthorID = $AID;
      $this->BookCover = $BC;
      $this->BookTitle = $BT;
      $this->CopiesSold = $CS;
      $this->PublishYear = $PY;
  }

  public function addBook($pdo){
    $query = "insert into `books`
    (`AuthorID`, `BookTitle`, `BookCover`, `CopiesSold`, `PublishYear`)
     values(:AID,:BT,:BC,:CS,:PY)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":AID", $this->AuthorID);
    $stmt->bindParam(":BT", $this->BookTitle);
    $stmt->bindParam(":BC", $this->BookCover);
    $stmt->bindParam(":CS", $this->CopiesSold);
    $stmt->bindParam(":PY", $this->PublishYear);
    $stmt->execute();
  }

  public function getBooks($pdo){
    $query = "select * From `books`";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    Return;
  }

}