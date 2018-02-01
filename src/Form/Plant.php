<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type as Type;

class Plant extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('type', Type\HiddenType::class,                array('mapped' => false, 'data' => \App\Entity\Plant::ENTITY_NAME));
        $builder->add('id',   Type\HiddenType::class);
        $builder->add('name',Type\TextType::class);
        $builder->add('latinName', Type\TextType::class);
        $builder->add('seedingPeriodStart', Type\TextType::class,    array('attr' => ['class' => 'picker', 'readonly' => false]));
        $builder->add('seedingPeriodEnd', Type\TextType::class,      array('attr' => ['class' => 'picker', 'readonly' => false]));
        $builder->add('harvestingPeriodStart', Type\TextType::class, array('attr' => ['class' => 'picker', 'readonly' => false]));
        $builder->add('harvestingPeriodEnd', Type\TextType::class,   array('attr' => ['class' => 'picker', 'readonly' => false]));
        $builder->add('save', Type\SubmitType::class,                array('attr' => ['class' => 'button']));
    }
}