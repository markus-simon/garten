<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type as Type;

class Config extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $configs = $options['data'];
        foreach ($configs as $config) {
            $type = ucfirst($config->getConfigType()) . "Type";
            $builder->add($config->getConfigKey(), "Symfony\Component\Form\Extension\Core\Type\\$type", array('data' => $config->getConfigValue()));
        }
        $builder->add('save', Type\SubmitType::class, array('attr' => ['class' => 'button']));
    }
}