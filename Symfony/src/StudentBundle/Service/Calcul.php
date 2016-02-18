<?php

namespace StudentBundle\Service;

class Calcul
{
    public function calculAge($date)
    {
        $year = $date->format('Y');
        $age  = date('Y') - $year;

        return $age;
    }
}