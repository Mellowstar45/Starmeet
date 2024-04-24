<?php
class Updatectrl extends Update
{
    private $id;
    private $fname2;
    private $lname2;
    public $genre2;
    private $old_pswd;
    private $new_pswd;
    public $city2;
    public $hobby2;
    public $orientation2;
    private $email2;
    public function AllowUpdate()
    {
        $this->emptyinput();
        $this->Invalid();
        $this->UpdateUser($this->id, $this->fname2, $this->lname2, $this->email2, $this->old_pswd, $this->new_pswd, $this->genre2, $this->city2, $this->hobby2, $this->orientation2);
    }
    public function __construct($id, $fname2, $lname2, $email2, $old_pswd, $new_pswd, $genre2, $city2, $hobby2, $orientation2)
    {
        $this->id = $id;
        $this->email2 = $email2;
        $this->fname2 = $fname2;
        $this->lname2 = $lname2;
        $this->genre2 = $genre2;
        $this->old_pswd = $old_pswd;
        $this->new_pswd = $new_pswd;
        $this->city2 = $city2;
        $this->hobby2 = $hobby2;
        $this->orientation2 = $orientation2;
    }

    private function emptyinput()
    {
        if (empty($this->email2) || empty($this->fname2) || empty($this->lname2) || empty($this->genre2) || empty($this->old_pswd) || empty($this->new_pswd) || empty($this->city2) || empty($this->hobby2) || empty($this->orientation2)) {
            header("Location: ../view/modifyaccount.php?error=Some fields are empty");
            exit();
        }
    }
    private function Invalid()
    {
        if (!preg_match("/^[a-zA-Z]*$/", $this->fname2) || !preg_match("/^[a-zA-Z]*$/", $this->lname2) || !preg_match("/^[a-z]+( [a-z,]+)*[a-z,]*$/i", $this->city2)) {
            header("Location: ../view/modifyaccount.php?error=Invalid name. Only letters are accepted.");
            exit();
        } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $this->old_pswd) || !preg_match("/^[a-zA-Z0-9]*$/", $this->new_pswd)) {
            header("Location: ../view/modifyaccount.php?error= Password should only contain letters and digits.");
            exit();
        } else if (!preg_match("/^[a-z]+( [a-z,]+)*[a-z,]*$/i", $this->hobby2)) {
            header("Location: ../view/modifyaccount.php?error= Write your hobby/ies properly please.");
            exit();
        }
    }
}