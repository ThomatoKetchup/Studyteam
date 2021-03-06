<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class GroupeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('anneeEtudeG', ChoiceType::class, array(
            'choices'  => array(
                '1ère année' => 1,
                '2ème année' => 2,
                '3ème année' => 3,
                '4ème année' => 4,
                '5ème année' => 5)))
            ->add('matiereG', ChoiceType::class, array(
                'choices'  => array(
                    'Probabilité' => 'Probabilité',
                    'Programmation Java' => 'Programmation Java',
                    'Histoire du droit' => 'Histoire du droit',)))
            ->add('jourG', ChoiceType::class, array(
                'choices'  => array(
                    'Lundi' => 'lundi',
                    'Mardi' => 'mardi',
                    'Mercired' => 'mercredi',
                    'Jeudi' => 'jeudi',
                    'Vendredi' => 'vendredi',
                    'Samedi' => 'samedi',)))
            ->add('heureDebutG', TimeType::class, array( 'input' => 'datetime', 'widget' => 'choice'))
            ->add('heureFinG', TimeType::class, array( 'input' => 'datetime', 'widget' => 'choice', ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Groupe'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_groupe';
    }


}
