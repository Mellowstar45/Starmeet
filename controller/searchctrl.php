<?php
class Searchctrl extends Search
{
    public $cities;
    public $hobby;
    public $hobby2;
    public $sex;
    public $min_age;
    public $max_age;

    public function SearchUser()
    {
        $this->SearchMatch(
            $this->cities,
            $this->hobby,
            $this->hobby2,
            $this->sex,
            $this->min_age,
            $this->max_age
        );
    }
    public function __construct($cities, $hobby, $hobby2, $sex, $min_age, $max_age)
    {
        $this->cities = $cities;
        $this->hobby = $hobby;
        $this->hobby2 = $hobby2;
        $this->sex = $sex;
        $this->min_age = $min_age;
        $this->max_age = $max_age;
    }
}

