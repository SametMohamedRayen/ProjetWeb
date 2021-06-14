<?php

namespace App\Form;

use App\Entity\Indoor;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ModifyIndoorType extends AbstractType
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
            ->add('price_min')
            ->add('price_max')
            ->add('target')
            ->add('user')
            ->add('Modify' , SubmitType::class ,[
                'attr'=>['label' =>'Modify']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Indoor::class,
        ]);
    }
}
