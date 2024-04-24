<?php
class Update extends MyDatabase
{
    protected function UpdateUser($id, $fname2, $lname2, $email2, $old_pswd, $new_pswd, $genre2, $city2, $hobby2, $orientation2)
    {
        $stmt = $this->connectDb()->prepare("SELECT * FROM user WHERE id=:userid;");
        $stmt->bindParam(':userid', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) == 0) {
            $stmt = null;
            header("Location: ../modifyaccount.php?error=nouserfound");
            exit();
        } else {
            $checkpswd = password_verify($old_pswd, $result[0]["passwordhash"]);
            if ($checkpswd == false) {
                $stmt = null;
                header("Location: ../modifyaccount.php?error=pswdnotmatching");
                exit();
            } elseif ($checkpswd === true) {
                $update = $this->connectDb()->prepare("UPDATE user SET email=:email,
        firstname=:fname, lastname=:lname, 
        gender=:genre, passwordhash=:pswd,
        hobby=:hobby,city=:city, orientation=:orientation  
        WHERE id=:userid AND is_active=true;");
                $encr_pswd1 = password_hash($new_pswd, PASSWORD_DEFAULT);
                $update->bindParam(":userid", $id, PDO::PARAM_INT);
                $update->bindParam(':email', $email2, PDO::PARAM_STR);
                $update->bindParam(':fname', $fname2, PDO::PARAM_STR);
                $update->bindParam(':lname', $lname2, PDO::PARAM_STR);
                $update->bindParam(':genre', $genre2, PDO::PARAM_STR);
                $update->bindParam(':pswd', $encr_pswd1, PDO::PARAM_STR);
                $update->bindParam(':city', $city2, PDO::PARAM_STR);
                $update->bindParam(':hobby', $hobby2, PDO::PARAM_STR);
                $update->bindParam(':orientation', $orientation2, PDO::PARAM_STR);
                $update->execute();

                $stmt1 = $this->connectDb()->prepare("SELECT * from user WHERE id=:id");
                $stmt1->bindParam(":id", $id, PDO::PARAM_INT);
                $stmt1->execute();
                $user = $stmt1->fetchAll(PDO::FETCH_ASSOC);


                $_SESSION['usermail'] = $user[0]["email"];
                $_SESSION['useruid'] = $user[0]["firstname"];
                $_SESSION['userlname'] = $user[0]["lastname"];
                $_SESSION['genre'] = $user[0]["genre"];
                $_SESSION['birthdate'] = $user[0]["birthdate"];
                $_SESSION['password'] = $user[0]["passwordhash"];
                $_SESSION['city'] = $user[0]["city"];
                $_SESSION['hobby'] = $user[0]["hobby"];
                $_SESSION['orientation'] = $user[0]["orientation"];
            }
        }
    }
}
