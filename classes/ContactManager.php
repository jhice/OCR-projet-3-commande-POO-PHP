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
        $query = 'SELECT * FROM contact;';
        $contactStatement = $client->prepare($query);
        $contactStatement->execute();
        $contacts = $contactStatement->fetchAll(PDO::FETCH_CLASS, "Contact");
        // Debug
        // print_r($contacts);

        return $contacts;
    }

    /**
     * récupération d'un contact via son id
     */
    public static function findById(int $id)
    {
        // Client de connexion à la base de données
        $client = DBConnect::getPDO();
        // On récupère le contact dont l'id est fourni
        $query = 'SELECT * FROM contact WHERE id = :id;';
        $contactStatement = $client->prepare($query);
        $contactStatement->execute([
            'id' => $id,
        ]);
        $contact = $contactStatement->fetchObject("Contact");
        // Debug
        // print_r($contact);

        return $contact;
    }

    /**
     * ajouter un contact
     * 
     * @param array $data Données du contact
     */
    public static function create(array $data)
    {
        // connexion
        $client = DBConnect::getPDO();

        // Ecriture de la requête préparée
        $query = 'INSERT INTO contact (name, email, phone_number) VALUES (:name, :email, :phone_number);';

        // Préparation
        $inserted = $client->prepare($query);

        // Exécution
        $success = $inserted->execute([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
        ]);

        if ($success) {
            return (int) $client->lastInsertId();
        } else {
            return false;
        }
    }

    /**
     * modifier un contact
     * 
     * @param array $data Données du contact
     */
    public static function modify(array $data)
    {
        // connexion
        $client = DBConnect::getPDO();

        // Ecriture de la requête préparée
        $query = 'UPDATE contact SET name = :name, email = :email, phone_number = :phone_number WHERE id = :id;';

        // Préparation
        $inserted = $client->prepare($query);

        // Exécution
        $success = $inserted->execute([
            'id' => $data['id'],
            'name' => $data['name'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
        ]);

        return $success;
    }

    /**
     * récupération d'un contact via son id
     */
    public static function deleteById(int $id)
    {
        // Client de connexion à la base de données
        $client = DBConnect::getPDO();
        // On tente de supprimer le contact
        $query = 'DELETE FROM contact WHERE id = :id;';
        $contactStatement = $client->prepare($query);
        $success = $contactStatement->execute([
            'id' => $id,
        ]);

        return $success;
    }
}

// tests
// $c = ContactManager::findAll();
// echo $c[0];