<?php

namespace App\Form;

use App\Entity\Endroit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FindPlacesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name' , TextType::class,array('required' => false) )
            ->add('age_min', IntegerType::class,array('required' => false))
            ->add('age_max',IntegerType::class,array('required' => false))
            ->add('eco_friendly')
            ->add('price_min', MoneyType::class,array('required' => false , "currency"=>"TND"))
            ->add('price_max', MoneyType::class,array('required' => false , "currency"=>"TND"))
            ->add('target', ChoiceType::class, array("choices"=>[
                "Tourists" => "Tourists",
                "Locals"=> "Locals",
                "Students" => "Students"
            ],
                "expanded"=> false , "multiple"=> false, "required"=>false))
            ->add('location', ChoiceType::class, array("required"=>false ,"expanded"=> false , "multiple"=> false,
                "choices"=> [
                    "Tunis" => "Tunis" ,
                    "Gabes" => "Gabes",
                    "Gafsa" => "Gafsa",
                    "Mahdia" => "Mahdia",
                    "Beja" => "Beja",
                ]))
            ->add('open', TimeType::class)
            ->add('close', TimeType::class)
            ->add('Search', SubmitType::class, [
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
