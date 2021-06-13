<?php

namespace App\Form;

use App\Entity\Evenement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\SubmitButton;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ModifyEventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('age_min')
            ->add('age_max')
            ->add('description')
            ->add('eco_friendly')
            ->add('name')
            ->add('photo')
            ->add('price')
            ->add('target')
            ->add('date')
            ->add('duration')
            ->add('link')
            ->add('number')
            ->add('user')
            ->add('location')
            ->add('Modify' , SubmitType::class ,[
                'attr'=>['label' =>'Modify']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Evenement::class,
        ]);
    }
}
