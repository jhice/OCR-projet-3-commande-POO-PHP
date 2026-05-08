<?php

require_once("./classes/ContactManager.php");

class Command
{
    public function list() {
        // on va chercher les contacts
        $contacts = ContactManager::findAll();
        // on les affiche en bouclant sur la liste
        foreach ($contacts as $contact) {
            // la méthode __toSting() est appelée
            echo $contact;
        }
    }
}