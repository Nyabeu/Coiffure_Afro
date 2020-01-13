<?php

namespace App\Form;

use App\Entity\ModelHairstyle;
use App\Entity\CategoryHairstyle;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class ModelHairstyleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('picture', FileType::class,  [
                'label' => 'Image',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        /*'mimeTypes' => [
                            'application/pdf',
                            'image/png',
                        ],*/
                        //'mimeTypesMessage' => 'Please upload a valid PDF/Image document',
                    ])
                ],
            ])
            ->add('model', ChoiceType::class, [
                'choices' => [
                    "Courte" => "Courte",
                    "Moyenne" => "Moyenne",
                    "Longue" => "Longue",
                ]
            ])
            ->add('description', TextareaType::class,[
                'attr'=>['row'=>'7'],
                ])
            ->add('price', IntegerType::class)
            ->add('categoty_hairstyle', EntityType::class, [
                        'class' => CategoryHairstyle::class,

                        'choice_label' => 'name',
                        'choice_value' => function (CategoryHairstyle $entity = null) {
                                                 return $entity ? $entity->getId() : '';},
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ModelHairstyle::class,
            'translation_domain' => 'forms',
        ]);
    }
}
