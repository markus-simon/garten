<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type as Type;

class Event extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('type', Type\HiddenType::class, array('mapped' => false, 'data' => \App\Entity\Event::ENTITY_NAME));
        $builder->add('id', Type\HiddenType::class);
        $builder->add('title', Type\TextType::class);
        $builder->add('date', Type\TextType::class);
        $builder->add('save', Type\SubmitType::class, array('attr' => ['class' => 'button']));
    }
}