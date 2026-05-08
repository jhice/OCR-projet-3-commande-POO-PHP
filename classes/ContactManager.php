<?php

require_once("./classes/DBConnect.php");
require_once("./classes/Contact.php");

class ContactManager
{
    /**
     * récupération de tous les contacts
     */
    public static function findAll()
    {
        // Client de connexion à la base de données
        $client = DBConnect::getPDO();
        // On récupère tout le contenu de la table contact
        $query = 'SELECT * FROM contact';
        $contactStatement = $client->prepare($query);
        $contactStatement->execute();
        $contacts = $contactStatement->fetchAll(PDO::FETCH_CLASS, "Contact");
        // Debug
        // print_r($contacts);
    
        return $contacts;
    }
}

// tests
// $c = ContactManager::findAll();
// echo $c[0];