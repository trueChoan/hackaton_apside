<?php

namespace App\Form;

use App\Entity\Project;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('product_owner', TextType::class)
            ->add('name', TextType::class)
            ->add('description', TextareaType::class)
            ->add('agency', null, ['choice_label' => 'name'])
            ->add('progress', TextType::class)
            ->add('techStack', null, ['choice_label' => 'techno'])
            ->add('domain', null, ['choice_label' => 'name'])
            ->add('ressource_0', TextType::class,[
                'mapped' => false,
            ])
            ->add('ressource_1', TextType::class,[
                'mapped' => false,
            ])
            ->add('ressource_2', TextType::class,[
                'mapped' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Project::class,
        ]);
    }
}
