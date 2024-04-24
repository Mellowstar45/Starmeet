<?php
class Loginctrl extends Login
{
    private $email1;
    private $pswd1;

    public function LoginUser()
    {
        $this->login($this->email1, $this->pswd1);
    }
    public function __construct($email1, $pswd1)
    {
        $this->email1 = $email1;
        $this->pswd1 = $pswd1;
    }
    /*   private function emptyinput(){
          if(empty($this->email)){
              echo "test";
          }
      }     */
}