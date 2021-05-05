<?php
class author{



  private $FirstName;
  private $LastName;

  public function getAuthorInfo($FN,$LN){
      $this->FirstName = $FN;
      $this->LastName = $LN;
  }

  public function addAuthor($pdo){
    $query = "insert into `author`(`AuthorFirstName`,`AuthorLastName`) values(:fn,:ln)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":fn", $this->FirstName);
    $stmt->bindParam(":ln", $this->LastName);
    $stmt->execute();
  }

}