<?php

namespace App\Form;

use App\Entity\Inscription;
use App\Entity\Atelier;
use App\Entity\Nuite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Form\RestaurationType;

class InscriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ateliers', EntityType::class, [
                'class' => Atelier::class,
                'choice_label' => 'libelle', // Assurez-vous que l'attribut 'nom' existe dans l'entité 'Atelier'
                'multiple' => true,
                'expanded' => true
            ])
            ->add('nuites', EntityType::class, [
                'class' => Nuite::class,
                'choice_label' => function ($nuite) {
                    return $nuite->getDateNuite()->format('Y-m-d') . ' - ' . $nuite->getHotel()->getPNom() . ' - ' . $nuite->getCategorie()->getLibelleCategorie();
                },
                'multiple' => true,
                'expanded' => true
            ])
            ->add('restaurations', CollectionType::class, [
                'entry_type' => RestaurationType::class,
                'entry_options' => ['label' => false],
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Inscription::class,
        ]);
    }
}
