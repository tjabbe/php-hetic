<?php
namespace Models;

/**
 * Class Promotion
 */
class Promotion
{
    /*
     * @var Array Students list
     */
    private $students;

    /*
     * @var Int Promotion year
     */
    private $year;

    public function __construct($students, $year)
    {
        $this->students = $students;
        $this->year = $year;
    }

    public function printPromotion()
    {
        echo '<h2>Promotion '. $this->year .'</h2>';

        foreach ($this->students as $student){
            echo '<p>'. $student->getFirstName() . ' ' . $student->getLastName() .'</p>';
        }
    }
}