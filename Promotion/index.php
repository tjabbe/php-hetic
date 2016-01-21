<?php

use \Models\Student;
use \Models\Promotion;
require 'vendor/autoload.php';

$studentList1 = [
    ['firstName' => 'Tom', 'lastName' => 'Bonnike'],
    ['firstName' => 'Nicolas', 'lastName' => 'Aguado'],
    ['firstName' => 'Lucas', 'lastName' => 'Martin'],
    ['firstName' => 'Louis', 'lastName' =>'Amiot']
];

$class1 = [];

foreach ($studentList1 as $student){
    $class1[] = new Student($student['firstName'], $student['lastName']);
}

$promotion1 = new Promotion($class1, '2018');

$studentList2 = [
    ['firstName' => 'John', 'lastName' => 'Doe'],
    ['firstName' => 'Jane', 'lastName' => 'Doe']
];

$class2 = [];

foreach ($studentList2 as $student){
    $class2[] = new Student($student['firstName'], $student['lastName'] );
}

$promotion2 = new Promotion($class2, '2019');

$promotion1->printPromotion();