<?php

namespace StudentBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use StudentBundle\Entity\Student;
use StudentBundle\Repository\StudentRepository;

class StudentControllerTest extends WebTestCase
{
    private $repo;

    protected function setUp()
    {
        self::bootKernel();

        $this->repo = static::$kernel->getContainer()
            ->get('doctrine.orm.entity_manager')
            ->getRepository('StudentBundle:Student');
    }

    public function testDateNaissanceAction()
    {
        $er = $this->repo;

        $students = $er->findAllOrderByDateNaissance();

        $this->assertTrue(is_array($students));

        foreach($students as $student){
            $this->assertInstanceOf(Student::class, $student);
        }

        foreach($students as $key => $value) {
            if (isset($students[$key + 1])){
                $this->assertGreaterThanOrEqual($students[$key]->getDateNaissance(), $students[$key + 1]->getDateNaissance());
            }
        }
    }
}