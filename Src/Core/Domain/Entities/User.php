<?php
namespace Core\Domain\Entities;

class User
{
    public function __construct($nis = null, $fullName)
    {
        if ($nis) {
            $this->nis = $nis;
        } else {
            $this->nis = $this->generateNIS();
        }
        $this->fullName = $fullName;
    }

    // private $id;
    private $nis;
    private $fullName;
    // public function getId()
    // {
    //     return $this->id;
    // }

    public function getNis()
    {
        return $this->nis;
    }

    public function getFullName()
    {
        return $this->fullName;
    }

    private function generateNIS()
    {
        $min = 10000000000; // Minimum value for the 11-digit number
        $max = 99999999999; // Maximum value for the 11-digit number
        return rand($min, $max);
    }

}