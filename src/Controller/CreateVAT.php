<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Controller;
use \App\Repository\AtelierRepository;

/**
 * Description of CreateVAT
 *
 * @author arthu
 */
class CreateVAT {
    
    
    #[Route('/admin/add_VAT', name: 'app_VAT')]
    public function addVAT(Request $request, AtelierRepository $atelierRepository): Response{
        
    }
    
    
}
