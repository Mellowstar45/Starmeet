<?php
class Login extends MyDatabase
{
  protected function login($email1, $pswd1)
  {
    $stmt = $this->connectDb()->prepare("SELECT passwordhash FROM user WHERE email=:mail;");
    $stmt->bindParam(':mail', $email1, PDO::PARAM_STR);
    $stmt->execute();
    $hashed_pswd = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $checkpswd = password_verify($pswd1, $hashed_pswd[0]['passwordhash']);
    if ($checkpswd == false) {
      $stmt = null;
      header("Location: ../view/connectpage.php?error=There is an error in the account or password.");
      exit();
    } elseif ($checkpswd == true) {
      $stmt = $this->connectDb()->prepare("SELECT * FROM user WHERE email=:mail AND passwordhash=:password AND is_active=true;");
      $stmt->bindParam(':mail', $email1, PDO::PARAM_STR);
      $stmt->bindParam(':password', $hashed_pswd[0]['passwordhash'], PDO::PARAM_STR);
      $stmt->execute();
      $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
      if (count($user) == 0) {
        $stmt = null;
        header("Location: ../view/connectpage.php?error=No User Found.");
        exit();
      }
      session_start();
      $_SESSION['userid'] = $user[0]['id'];
      $_SESSION['usermail'] = $user[0]['email'];
      $_SESSION['useruid'] = $user[0]['firstname'];
      $_SESSION['userlname'] = $user[0]['lastname'];
      $_SESSION['gender'] = $user[0]['gender'];
      $_SESSION['birthdate'] = $user[0]['birthdate'];
      $_SESSION['password'] = $user[0]['passwordhash'];
      $_SESSION['city'] = $user[0]['city'];
      $_SESSION['hobby'] = $user[0]['hobby'];
      $_SESSION['orientation'] = $user[0]['orientation'];
    }
  }

  /* public function checkuser($email1, $fname, $lname, $genre, $mail, $birthdate, $pswd, $pswd_repeat, $city, $hobby, $orientation)
  {
    $duplicate = $this->Db->prepare("SELECT * from user where email=:email");
    $duplicate->bindParam(':email', $email, PDO::PARAM_STR);
    $duplicate->execute();
    $result = $duplicate->fetchAll();
    if (count($result) > 0) {
      $duplicateresult = false;
    } else {
      $duplicateresult = true;
    }
    return $duplicateresult;
  } */
}