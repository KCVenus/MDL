<?php
namespace App\Service;

use App\Entity\Licencie;
use App\Entity\Club;
use App\Entity\Qualite;
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
    
    
    
 public function getClub($id): Club {
        //$json = $this->client->request('GET', 'http://10.10.2.149/maisondesliguesapi/public/index.php/club/' . $id); //url epreuve
        $json = $this->client->request('GET', 'http://localhost:2280/maisondesliguesapi/public/index.php/club/' . $id); //url remote
//        $club = $json->getContent() != null ? $this->serializer->deserialize($json->getContent(), Club::class, 'json') : false;
        $club = $this->serializer->deserialize($json->getContent(), Club::class, 'json');

        return $club;
    }

    public function getQualite($id): \App\Entity\Qualite {
        //$json = $this->client->request('GET', 'http://10.10.2.149/maisondesliguesapi/public/index.php/qualite/' . $id); //url epreuve
        $json = $this->client->request('GET', 'http://localhost:2280/maisondesliguesapi/public/index.php/qualite/' . $id); //remote
        $qualite = $json->getContent() != null ? $this->serializer->deserialize($json->getContent(), Qualite::class, 'json') : false;

        return $qualite;
    }
}
