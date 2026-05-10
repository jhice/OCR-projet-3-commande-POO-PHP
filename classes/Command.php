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

    /**
     * modifie un contact
     */
    public function modify(array $data) {

        // on va chercher le contact dont l'id est fourni
        $contact = ContactManager::findById($data["id"]);

        // 
        if (!$contact) {
            echo "Contact non trouvé\n";

            return;
        }

        // on appelle la méthode de modification sur la base de données
        $updated = ContactManager::modify($data);

        if ($updated) {
            // OK
            echo "Contact modifié : {$contact->getId()}\n";
            // on affiche le contact modifié
            $contact = ContactManager::findById($data["id"]);
            echo $contact;
        } else {
            // Pas OK
            echo "Erreur à l\'enregistrement\n";
        }
    }

    /**
     * supprime un contact
     */
    public function delete(int $id) {
        
        // on va chercher le contact dont l'id est fourni
        $contact = ContactManager::findById($id);

        // 
        if (!$contact) {
            echo "Contact non trouvé\n";

            return;
        }

        // on supprime le contact dont l'id est fourni
        $deleted = ContactManager::deleteById($id);

        if ($deleted) {
            // la méthode __toSting() est appelée
            echo "Contact supprimé : {$contact->getName()}\n";
        } else {
            echo "Erreur à la suppression\n";
        }
    }
}