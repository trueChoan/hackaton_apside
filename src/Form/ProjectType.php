<?php

namespace App\Form;

use App\Entity\Project;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('agency', null, ['choice_label' => 'name'])
            // ->add('user', null, [
            //     'choice_label' => 'lastname',
            //     'multiple' => true,
            //     'expanded' => true,
            //     'by_reference' => false,
            // ])
            ->add('techStack', null, ['choice_label' => 'techno'])
            ->add('domain', null, ['choice_label' => 'name'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Project::class,
        ]);
    }
}
