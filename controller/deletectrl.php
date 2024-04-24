<?php
class Deletectrl extends Delete
{
    private $pswd1;
    private $id;
    public function AllowDelete()
    {
        $this->Deleteuser($this->pswd1, $this->id);
    }
    public function __construct($pswd1, $id)
    {
        $this->pswd1 = $pswd1;
        $this->id = $id;
    }
}