<?php

namespace StudentBundle\Entity;

/**
 * Category
 */
class Category
{
    /**
     * @var string
     */
    private $label;

    /**
     * @var integer
     */
    private $id;

    protected $students;

    public function __construct()
    {
        $this->students = new ArrayCollection();
    }


    /**
     * Set label
     *
     * @param string $label
     *
     * @return Category
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get label
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Add student
     *
     * @param \StudentBundle\Entity\Student $student
     *
     * @return Category
     */
    public function addStudent(\StudentBundle\Entity\Student $student)
    {
        $this->students[] = $student;

        return $this;
    }

    /**
     * Remove student
     *
     * @param \StudentBundle\Entity\Student $student
     */
    public function removeStudent(\StudentBundle\Entity\Student $student)
    {
        $this->students->removeElement($student);
    }

    /**
     * Get students
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStudents()
    {
        return $this->students;
    }
}
