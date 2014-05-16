<?php

namespace Btn\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GameType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',        'text')
            ->add('developer',   'text')
            ->add('description', 'textarea')
            ->add('category',    null)
            ->add('platforms',   null)
            ->add('releasedAt',  null)
            ->add('save',        'submit');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Btn\AppBundle\Entity\Game',
        ));
    }

    public function getName()
    {
        return 'game';
    }
}
