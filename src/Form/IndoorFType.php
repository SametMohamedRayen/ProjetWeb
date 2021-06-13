<?php

namespace App\Form;

use App\Entity\Indoor;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class IndoorFType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',TextType::class)
            ->add('age_min',IntegerType::class)
            ->add('age_max',IntegerType::class)
            ->add('description',TextType::class)
            ->add('eco_friendly')
            ->add('photo',FileType::class)
            ->add('price_min',MoneyType::class,array('currency'=>'TND'))
            ->add('price_max',MoneyType::class,array('currency'=>'TND'))
            ->add('target',ChoiceType::class,['choices'=>['Tourists'=>'Tourists','Locals'=>'Locals','Students'=>'Students']])
            ->add('Ajouter' , SubmitType::class ,[
                'attr'=>['label' =>'Ajouter']
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
