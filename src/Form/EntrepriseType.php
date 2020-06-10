<?php

namespace App\Form;

use App\Entity\Entreprise;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class EntrepriseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('raisonSociale', TextType::class, [
                'attr' => ['class' => 'uk-input']
            ])
            ->add('siret', TextType::class ,[
                'attr' => ['class' => 'uk-input']
            ])
            ->add('adresse', TextType::class, [
                'attr' => ['class' => 'uk-input']
            ])
            ->add('cp',TextType::class, [
                'attr' => ['class' => 'uk-input']
                ])
            ->add('ville', TextType::class ,[
                'attr' => ['class' => 'uk-input']
            ])
                   
            ->add('Valider', SubmitType::class, [
                'attr' => ['class' => 'btn btn-primary uk-margin-top']
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Entreprise::class,
        ]);
    }
}
