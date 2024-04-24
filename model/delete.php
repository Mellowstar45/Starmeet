<?php
class Delete extends MyDatabase
{
    public function Deleteuser($pswd1, $id)
    {
        $stmt = $this->connectDb()->prepare("SELECT * FROM user where id=:userid AND is_active=true;");
        $stmt->bindParam(':userid', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) == 0) {
            $stmt = null;
            header("Location: ../view/connectpage.php?error=useralreadydoesntexist");
        } else {
            $checkpswd = password_verify($pswd1, $result[0]["passwordhash"]);
            if ($checkpswd == false) {
                $stmt = null;
                header("Location: ../modifyaccount.php?error=pswdnotmatching");
                exit();
            }
            $stmt1 = $this->connectDb()->prepare("UPDATE user SET is_active=false WHERE id=:userid;");
            $stmt1->bindParam(':userid', $id, PDO::PARAM_INT);
            $stmt1->execute();
            session_unset();
            session_destroy();
            header("Location: ../view/connectpage.php?error=goodbye");
        }
    }
}