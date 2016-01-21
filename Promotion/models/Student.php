<?php
namespace Models;

/**
 * Class Student
 */
class Student
{
    /*
     * @var String First name
     */
    private $firstName;

    /*
     * @var String Last name
     */
    private $lastName;

    public function __construct($firstName, $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;

        self::$students[] = $this;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    private static $students = [];

    public static function getStudents()
    {
        return self::$students;
    }

    public function __destruct()
    {
        $index = array_search($this, self::$students);
        array_splice(self::$students, $index, 1);
    }
}