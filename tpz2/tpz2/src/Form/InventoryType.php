<?php
/**
 * Created by PhpStorm.
 * User: nicolas.horn
 * Date: 20/11/17
 * Time: 14:46
 */

namespace App\Form;

use App\Entity\Inventory;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class InventoryType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver){
        $resolver->setDefaults(array('data_class' => Inventory::class));
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add("numberOfItem",IntegerType::class)
            ->add("person")
            ->add("material")
            ->add("save",SubmitType::class, array('label' => 'créer'))
            ->getForm();

    }


}