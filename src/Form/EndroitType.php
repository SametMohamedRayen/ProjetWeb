<?php

namespace App\Form;

use App\Entity\Endroit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EndroitType extends AbstractType
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
            ->add('location', ChoiceType::class, array("expanded"=> false , "multiple"=> false,
                "choices"=> [
                    "Tunis" => "Tunis" ,
                    "Gabes" => "Gabes",
                    "Gafsa" => "Gafsa",
                    "Mahdia" => "Mahdia",
                    "Beja" => "Beja",
                ]))
            ->add('open',TimeType::class)
            ->add('close',TimeType::class)
            ->add('Ajouter' , SubmitType::class ,[
                'attr'=>['label' =>'Ajouter']
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
