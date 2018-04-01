<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class SearchType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $filiereG = $anneeEtudeG = $matiereG = $jourG = $heureDebutG = $heureFinG = NULL;
        $builder->add('anneeEtudeG', ChoiceType::class, array(
                'choices'  => array(
                    '1ère année' => 1,
                    '2ème année' => 2,
                    '3ème année' => 3,
                    '4ème année' => 4,
                    '5ème année' => 5)))
            ->add('matiereG', ChoiceType::class, array(
                'choices'  => array(
                    'Probabilités' => 'Probabilités',
                    'Programmation Java' => 'Programmation Java',
                    'Histoire du droit' => 'Histoire du droit',)))
            ->add('jourG', ChoiceType::class, array(
                'choices'  => array(
                    'Lundi' => 'lundi',
                    'Mardi' => 'mardi',
                    'Mercredi' => 'mercredi',
                    'Jeudi' => 'jeudi',
                    'Vendredi' => 'vendredi',
                    'Samedi' => 'samedi',)))
            ->add('heureDebutG', TimeType::class, array( 'input' => 'datetime', 'widget' => 'choice'))
            ->add('heureFinG', TimeType::class, array( 'input' => 'datetime', 'widget' => 'choice', ));
    }

}
