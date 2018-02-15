<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type as Type;

class Cms extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('id',           Type\HiddenType::class);
        $builder->add('title',        Type\TextType::class);
        $builder->add('image',        Type\FileType::class, array('required' => false, 'label' => 'Bild hochladen', 'attr' => ["accept" =>"image/*;capture=camera"]));
        $builder->add('uploadedImage',Type\HiddenType::class, array('mapped' => false));
        $builder->add('content',      Type\TextareaType::class, array('attr' => ['rows' => 4]));
        $builder->add('user',         Type\HiddenType::class);
        $builder->add('save',         Type\SubmitType::class,   array('attr' => ['class' => 'button']));
    }
}