<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;


/**
 * Description of AtelierForm
 *
 * @author arthu
 */
class AtelierFormType extends AbstractType{
    
    /**
     * BuildForm est une méthode essentielle dans tous les types de formulaires Symfony.
     * Elle est utilisée pour construire le formulaire en ajoutant des champs.
     *
     * @param FormBuilderInterface $builder Le constructeur de formulaire est utilisé pour ajouter des champs au formulaire.
     * @param array $options Les options passées au formulaire, permettant une configuration supplémentaire.
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // Commence la construction du formulaire.
        $builder
            // Ajoute un champ 'libelle' de type texte.
            // Ce champ permettra à l'utilisateur de saisir un libellé pour l'atelier.
            ->add('libelle', TextType::class)
            
            // Ajoute un champ 'nbPlacesMaxi' également de type texte.
            // Ce champ est destiné à la saisie du nombre maximal de places disponibles dans l'atelier.
            ->add('nbPlacesMaxi', TextType::class);
    } 
}