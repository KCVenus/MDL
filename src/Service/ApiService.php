<?php
namespace App\Service;

use App\Entity\Licencie;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
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
     private SerializerInterface $serializer ){}   

    
     public function getLicencie($licence):Licencie
    {
        $json = $this->client->request('GET', 'http://localhost:2280/maisondesliguesapi/public/index.php/licencie/' . $licence); 
        $licencie = $this->serializer->deserialize($json->getContent(), Licencie::class, 'json');
        
        return $licencie;
    }  
    
    
    
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
}
