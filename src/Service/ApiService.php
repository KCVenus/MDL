<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of ApiService
 *
 * @author arthur.demoisson
 */
class ApiService {
    
     public function __construct(  
     private HttpClientInterface $client,
     private SerializerInterface $serialize ){}   

     public function getLesClubs(): array
     {
         $json = $this->client->request('GET', "http://maisondesliguesapi.fr:8080/licencie/clubs"); 
         $clubs = $this->serializer->deserialize($json->getContent(), Club::class, 'json');
         return new Response($clubs);

     }
     
     public function getUnClub($id): Club
     {
         $json = $this->client->request('GET', "http://maisondesliguesapi.fr:8080/licencie/club/".$id); 
         $club = $this->serializer->deserialize($json->getContent(), Club::class, 'json');
         return $club;

     }
     
     
     
     public function getLicencie($id):Licencie
    {
        $json = $this->client->request('GET', 'http://maisondesliguesapi.fr:8080/licencie/'.$id); 
        $licencie = $this->serializer->deserialize($json->getContent(), Licencie::class, 'json');

        return $licencie;
    }
    
    
    
    
    
    
}
