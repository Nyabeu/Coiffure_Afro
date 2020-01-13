<?php

namespace App\Form;

use App\Entity\Contact;
use App\Entity\City;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;



class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class)
            ->add('lastname', TextType::class)
            ->add('email', TextType::class)
            ->add('address', TextType::class)
            ->add('postalCode', IntegerType::class)
            ->add('phone', IntegerType::class)
            ->add('message', TextareaType::class, [
                'attr' => [
                    'row' => '5',
                ]
            ])
            ->add('cityContact', EntityType::class,[
                        'class' => City::class,

                        'choice_label' => 'name',
                        'choice_value' => function (City $entity = null) {
                                                 return $entity ? $entity->getId() : '';}
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
            'translation_domain' => 'forms',
        ]);
    }
}
