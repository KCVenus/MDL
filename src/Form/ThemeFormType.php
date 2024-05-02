<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;


/**
 * Description of ThemeFormType
 *
 * @author arthu
 */
// Définition de la classe ThemeFormType qui hérite de AbstractType, utilisée pour créer des formulaires dans Symfony.
class ThemeFormType extends AbstractType {
    
    // Méthode buildForm est utilisée pour construire le formulaire avec les champs spécifiques.
    public function buildForm(FormBuilderInterface $builder, array $options) {
        
        // Commence la construction du formulaire.
        $builder
            // Ajoute un champ de type liste déroulante pour choisir un atelier.
            ->add('atelier', ChoiceType::class, [
                // Les options pour ce champ sont prises du tableau 'ateliers' passé lors de la création du formulaire.
                'choices' => $options['ateliers'],

                // Définit comment les libellés des options doivent être affichés dans le formulaire.
                // 'choice_label' permet de personnaliser l'affichage des options dans la liste.
                'choice_label' => function ($choice, $key, $value) {
                    // Utilise la clé de chaque choix dans 'choices' comme libellé affiché.
                    return $key; 
                },

                // Définit la valeur retournée pour chaque option.
                'choice_value' => function ($choice) {
                    // La valeur de chaque option est le choix lui-même.
                    return $choice;
                },

                // Définit le libellé du champ dans le formulaire.
                'label' => 'Atelier associé'
            ])

            // Ajoute un champ texte pour entrer le libellé du thème.
            ->add('libelle', TextType::class); // Ce champ permettra à l'utilisateur de saisir le libellé du thème.
    }

    // Cette méthode configure les options nécessaires pour ce type de formulaire.
    public function configureOptions(OptionsResolver $resolver) {
        // Indique que 'ateliers' est une option requise pour créer ce formulaire.
        $resolver->setRequired('ateliers'); // Cette option doit être fournie lors de l'initialisation du formulaire.
    }
}

