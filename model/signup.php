<?php
class Register extends MyDatabase
{

  protected function adduser($email, $fname, $lname, $genre, $birthdate, $pswd, $city, $hobby, $orientation)
  {
    try {
      /*  $stmt = $this->connectDb()->prepare("INSERT INTO user ('id', 'email', 'firstname', 'lastname', 'genre', 'birthdate', 'passwordhash', 'city', 'hobby', 'orientation') 
       VALUES (NULL, :mail, :fname, :lname, :genre, :birthdate, :password, :city, :hobby, :orientation)"); */
      $stmt = $this->connectDb()->prepare("INSERT INTO user VALUES (NULL, :mail,  :fname, :lname, :genre, :birthdate, :password, :city, :hobby, :orientation,TRUE);");
      $encr_pswd = password_hash($pswd, PASSWORD_DEFAULT);
      $stmt->bindParam(':mail', $email, PDO::PARAM_STR);
      $stmt->bindParam(':fname', $fname, PDO::PARAM_STR);
      $stmt->bindParam(':lname', $lname, PDO::PARAM_STR);
      $stmt->bindParam(':genre', $genre, PDO::PARAM_STR);
      $stmt->bindParam(':birthdate', $birthdate, PDO::PARAM_STR);
      $stmt->bindParam(':password', $encr_pswd, PDO::PARAM_STR);
      $stmt->bindParam(':city', $city, PDO::PARAM_STR);
      $stmt->bindParam(':hobby', $hobby, PDO::PARAM_STR);
      $stmt->bindParam(':orientation', $orientation, PDO::PARAM_STR);
      $stmt->execute();
    } catch (PDOException $e) {
      die('<h1>' . var_dump($pswd) . 'Erreur: ' . $e->getMessage() . '</h1>');
    }
  }
  public function checkuser($email)
  {
    $duplicate = $this->connectDb()->prepare("SELECT * from user where email=:mail");
    $duplicate->bindParam(':mail', $email, PDO::PARAM_STR);
    $duplicate->execute();
    $result = $duplicate->fetchAll();
    if (count($result) > 0) {
      header("Location: ../view/connectpage.php?error=User exists already");
      exit();
    }
  }
}