<?php

namespace StudentBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use StudentBundle\Entity\Student;
use StudentBundle\Form\StudentType;
use StudentBundle\Repository\StudentRepository;

class StudentController extends Controller
{
    public function showAction(){
        $em = $this->getDoctrine()->getManager();


        $students = $em->getRepository('StudentBundle:Student')->findAll();

        $calcul = $this->get('student.calcul');

        foreach ($students as $student){
            $student->age = $calcul->calculAge($student->getDateNaissance());
        }

        return $this->render('student/index.html.twig', array(
            'students' => $students,
        ));
    }

    public function detailsAction(Student $student){
        $calcul = $this->get('student.calcul');
        $student->age = $calcul->calculAge($student->getDateNaissance());

        return $this->render('student/show.html.twig', array(
            'student'     => $student
        ));
    }

    public function addAction(Request $request){
        $student = new Student();

        $form = $this->createForm('StudentBundle\Form\StudentType', $student);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($student);
            $em->flush();

            return $this->redirectToRoute('student_show', array('id' => $student->getId()));
        }

        return $this->render('student/add.html.twig', array(
            'student' => $student,
            'form' => $form->createView(),
        ));
    }

    public function editAction(Request $request, Student $student)
    {
        $deleteForm = $this->createDeleteForm($student);
        $editForm = $this->createForm('StudentBundle\Form\StudentType', $student);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($student);
            $em->flush();

            return $this->redirectToRoute('student_edit', array('id' => $student->getId()));
        }

        return $this->render('student/edit.html.twig', array(
            'student' => $student,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    public function deleteAction(Request $request, Student $student)
    {
        $form = $this->createDeleteForm($student);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($student);
            $em->flush();
        }

        return $this->redirectToRoute('student_index');
    }

    private function createDeleteForm(Student $student)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('student_delete', array('id' => $student->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

    public function dateNaissanceAction()
    {
        $er = $this->getDoctrine()->getEntityManager()->getRepository('StudentBundle:Student');

        $students = $er->findAllOrderByDateNaissance();

        return $this->render('student/datenaissance.html.twig', array(
            'students' => $students
        ));
    }
}