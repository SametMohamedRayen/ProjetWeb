<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class FindPlansType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Search')
            ->add('Events', CheckboxType::class, [
                'label'    => 'Events',
                'attr' => [
                    'class' => 'form-check-input',
                    'id'=> "events-checkbox" ,
                ]
            ])
            ->add('Places', CheckboxType::class, [
                'label'    => 'Places',
                'attr' => [
                    'class' => 'form-check-input',
                    'id'=> "events-checkbox" ,
                ]
            ])
            ->add('Indoors', CheckboxType::class, [
                'label'    => 'Indoors',
                'attr' => [
                    'class' => 'form-check-input',
                    'id'=> "events-checkbox" ,

                ]
            ])
            ->add('submit', SubmitType::class, [
                'attr' => ['class' => 'btn btn-primary'],
            ]);

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
