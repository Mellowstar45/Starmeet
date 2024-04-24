<?php
class Registerctrl extends Register
{
    private $email;
    private $fname;
    private $lname;
    public $genre;
    public $birthdate;
    private $pswd;
    private $pswd_repeat;
    public $city;
    public $hobby;
    public $orientation;

    public function SignupUser()
    {
        $this->emptyinput();
        $this->Invalid();
        $this->checkuser($this->email);
        $this->Agechecker($this->birthdate);
    }
    public function __construct($email, $fname, $lname, $genre, $birthdate, $pswd, $pswd_repeat, $city, $hobby, $orientation)
    {
        $this->email = $email;
        $this->fname = $fname;
        $this->lname = $lname;
        $this->genre = $genre;
        $this->birthdate = $birthdate;
        $this->pswd = $pswd;
        $this->pswd_repeat = $pswd_repeat;
        $this->city = $city;
        $this->hobby = $hobby;
        $this->orientation = $orientation;
    }
    private function Agechecker($birthdate)
    {
        $dob = new DateTime($birthdate);
        $today = new DateTime('today');
        $year = $dob->diff($today)->y;
        if ($year < "18") {
            header("Location: ../connectpage.php?error=tooyoung");
            exit();
        } else {
            $this->adduser($this->email, $this->fname, $this->lname, $this->genre, $this->birthdate, $this->pswd, $this->city, $this->hobby, $this->orientation);
        }
    }
    private function emptyinput()
    {
        if (empty($this->email) || empty($this->fname) || empty($this->lname) || empty($this->genre) || empty($this->birthdate) || empty($this->pswd) || empty($this->pswd_repeat) || empty($this->city) || empty($this->hobby) || empty($this->orientation)) {
            header("Location: ../view/connectpage.php?error=Some fields are empty");
            exit();
        }
    }
    private function Invalid()
    {
        if (!preg_match("/^[a-zA-Z]*$/", $this->fname) || !preg_match("/^[a-zA-Z]*$/", $this->lname) || !preg_match("/^[a-z]+( [a-z,]+)*[a-z,]*$/i", $this->city)) {
            header("Location: ../view/connectpage.php?error=Invalid name. Only letters are accepted.");
            exit();
        } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $this->pswd) || !preg_match("/^[a-zA-Z0-9]*$/", $this->pswd_repeat)) {
            header("Location: ../view/connectpage.php?error= Password should only contain letters and digits.");
            exit();
        } else if (!preg_match("/^[a-z]+( [a-z,]+)*[a-z,]*$/i", $this->hobby)) {
            header("Location: ../view/connectpage.php?error= Write your hobby/ies properly please.");
            exit();
        }
    }
}