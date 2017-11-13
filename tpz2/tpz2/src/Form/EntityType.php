<?php

/**
 * Created by PhpStorm.
 * User: nicolas.horn
 * Date: 13/11/17
 * Time: 16:14
 */
namespace App\Form;
use App\Entity\Person;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class EntityType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver){
        $resolver->setDefaults(array('data_class' => Person::class));
    }

    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder->add("name",TextType::class)
            ->add("name",TextType::class)
            ->add("age",IntegerType::class)
            ->add("visible",ChoiceType::class, array(
                'choices' => array(
                    'Yes' => true,
                    'No' => false,
                )
            ))
            ->add("created_at",DateType::class)
            ->add("color",TextType::class)
            ->add("save",SubmitType::class, array('label' => 'créer'))
            ->getForm();
    }

}