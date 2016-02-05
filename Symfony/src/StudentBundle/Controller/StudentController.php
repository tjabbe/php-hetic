<?php

namespace StudentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use StudentBundle\Entity\Student;

class StudentController extends Controller
{
    public function showAction(){
        $em = $this->getDoctrine()->getManager();

        $students = $em->getRepository('StudentBundle:Student')->findAll();

        return $this->render('student/index.html.twig', array(
            'students' => $students,
        ));
    }

    public function detailsAction(Student $student){
        return $this->render('student/show.html.twig', array(
            'student' => $student
        ));
    }
}
