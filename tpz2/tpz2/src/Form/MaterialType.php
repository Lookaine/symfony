<?php
/**
 * Created by PhpStorm.
 * User: nicolas.horn
 * Date: 20/11/17
 * Time: 14:46
 */

namespace App\Form;

use App\Entity\Material;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;


class MaterialType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver){
        $resolver->setDefaults(array('data_class' => Material::class));
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add("name",TextType::class)
            ->add("weight",NumberType::class)
            ->add("save",SubmitType::class, array('label' => 'créer'))
            ->getForm();

    }

}