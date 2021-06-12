<?php

namespace App\Form;

use App\Entity\Evenement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FindEventsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('age_min',IntegerType::class,array('required' => false))
            ->add('age_max',IntegerType::class,array('required' => false))
            ->add('description', HiddenType::class,array('required'=>false))
            ->add('eco_friendly')
            ->add('name' , TextType::class,array('required' => false))
            ->add('price', MoneyType::class,array('required' => false , "currency"=>"TND"))
            ->add('target')
            ->add('date', DateType::class, array('required'=>false,  'widget' => 'single_text',  'empty_data' => null))
            ->add('duration' , IntegerType::class, array('required'=>false))
            ->add('number', IntegerType::class, array('required'=>false))
            ->add('Search', SubmitType::class, [
                'attr' => ['label' => 'Search']
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
