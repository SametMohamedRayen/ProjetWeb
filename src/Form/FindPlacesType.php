<?php

namespace App\Form;

use App\Entity\Endroit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FindPlacesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('age_min')
            ->add('age_max')
            ->add('description')
            ->add('eco_friendly')
            ->add('nom')
            ->add('photo')
            ->add('price_min')
            ->add('price_max')
            ->add('target')
            ->add('location')
            ->add('open')
            ->add('close')
            ->add('name')
            ->add('Add', SubmitType::class, [
                'attr' => ['label' => 'Search']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Endroit::class,
        ]);
    }
}
