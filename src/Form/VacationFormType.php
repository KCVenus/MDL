<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Description of VacationFormType
 *
 * @author arthu
 */
// Définition de la classe VacationFormType qui étend AbstractType, une classe de base pour les types de formulaire dans Symfony.
class VacationFormType extends AbstractType {
    // Méthode buildForm est utilisée pour construire le formulaire.
    public function buildForm(FormBuilderInterface $builder, array $options) {
        
        // Démarre la construction du formulaire avec la méthode add().
        $builder
                // Ajoute un champ 'atelier' de type ChoiceType, utilisé pour des sélections via une liste déroulante.
                ->add('atelier', ChoiceType::class, [
                    // 'choices' reçoit une liste d'ateliers, passée via les options lors de la création du formulaire.
                    'choices' => $options['ateliers'],
                    
                    // 'choice_label' est utilisé pour déterminer ce qui est affiché pour chaque choix dans la liste déroulante.
                    'choice_label' => function ($choice, $key, $value) {
                        // La clé de chaque choix est utilisée comme label.
                        return $key;
                    },
                    
                    // 'choice_value' est utilisé pour déterminer la valeur retournée pour chaque choix.
                    'choice_value' => function ($choice) {
                        // Le choix lui-même est utilisé comme valeur.
                        return $choice;
                    },
                    
                    // 'label' est le texte affiché à côté de la liste déroulante dans le formulaire.
                    'label' => 'Atelier associé'
                ])

                // Ajoute un champ pour la date de début, utilisant DateTimeType pour permettre une saisie de date et heure.
                ->add('dateDebut', DateTimeType::class)
                
                // Ajoute un champ pour la date de fin, également avec DateTimeType.
                ->add('dateFin', DateTimeType::class);
    }

    // La méthode configureOptions permet de définir des options pour ce type de formulaire.
    public function configureOptions(OptionsResolver $resolver) {
        // Indique que l'option 'ateliers' est requise pour ce formulaire.
        $resolver->setRequired('ateliers');
    }
}

