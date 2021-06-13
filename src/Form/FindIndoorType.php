<?php

namespace App\Form;

use App\Entity\Indoor;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FindIndoorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class,array('required' => false))
            ->add('age_min', IntegerType::class,array('required' => false))
            ->add('age_max', IntegerType::class,array('required' => false))
            ->add('eco_friendly')
            ->add('price_min',MoneyType::class, array('required' => false , "currency"=>"TND"))
            ->add('price_max',MoneyType::class, array('required' => false , "currency"=>"TND"))
            ->add('target')
            ->add('Search', SubmitType::class, [
                'attr' => ['label' => 'Search']
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
