<?php

namespace App\Form;

use App\Entity\Language;
use App\Entity\Project;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjectType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('url')
            ->add('publicVisible',CheckboxType::class, array(
        'label'    => 'Project is public?',
        'required' => false,
    ))
            ->add('defaultLang', ChoiceType::class, array(
                'choices' => array_count_values(Language::getAllLocales()),
                'preferred_choices' => array('French (France)')
                ))
            /*->add('languages', ChoiceType::class, [
                'choices'  => array_count_values(Language::getAllLocales()),
                'multiple'  => true,
                'attr' => ['class' => '.ms-choice.disabled'],
            ])*/

            ->add('file', FileType::class, array('label' => 'Your file to translate'))
            ->add('submit', SubmitType::class, [
                'label' => 'Create',
                'attr' => ['class' => 'btn btn-default pull-right'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Project::class,
        ]);
    }
}
