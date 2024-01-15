<?php

namespace App\Form;

use App\Entity\Exercice;
use App\Entity\Sessions;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExerciceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('breakTime')
            ->add('series')
            ->add('repeats')
            ->add('sessions', EntityType::class, [
                'class' => Sessions::class,
                'choice_label' => 'proprieteDescriptive', // Remplacez 'proprieteDescriptive' par une propriété de Sessions
                'multiple' => true,
                'required' => false, // Rend le champ optionnel
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Exercice::class,
        ]);
    }
}
