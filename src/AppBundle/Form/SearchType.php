<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class SearchType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $filiereG = $anneeEtudeG = $matiereG = $jourG = $heureDebutG = $heureFinG = NULL;
        $builder->add('filiereG')->add('anneeEtudeG')->add('matiereG')->add('jourG')->add('heureDebutG', TimeType::class, array( 'input' => 'datetime', 'widget' => 'choice'))->add('heureFinG', TimeType::class, array( 'input' => 'datetime', 'widget' => 'choice', ));
    }

}