<?php

namespace StudentBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StudentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('sexe', 'choice', array(
                'choices'  => array('femme' => 'femme', 'homme' => 'homme'),
                'expanded' => true
            ))
            ->add('dateNaissance', 'date', array(
                'years' => range(date('Y') - 100, date('Y') - 7)
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'StudentBundle\Entity\Student'
        ));
    }
}
