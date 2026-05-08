<?php

require_once("./classes/ContactManager.php");

class Command
{
    /**
     * liste des contacts
     */
    public function list() {
        // on va chercher les contacts
        $contacts = ContactManager::findAll();
        // on les affiche en bouclant sur la liste
        foreach ($contacts as $contact) {
            // la méthode __toSting() est appelée
            echo $contact;
        }
    }

    /**
     * affiche un contact
     */
    public function detail(int $id) {
        // on va chercher le contact dont l'id est fourni
        $contact = ContactManager::findById($id);

        if ($contact) {
            // la méthode __toSting() est appelée
            echo $contact;
        } else {
            echo "Contact non trouvé\n";
        }
    }

    /**
     * crée un contact
     */
    public function create(array $data) {

        // on appelle la méthode d'ajout à la base de données
        $inserted = ContactManager::create($data);

        if ($inserted) {
            // on affiche le contact
            $contact = ContactManager::findById($inserted);
            echo "Contact ajouté :\n";
            echo $contact;
        } else {
            echo "Erreur à l\'enregistrement\n";
        }
    }
}