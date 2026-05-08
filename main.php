<?php

// classe commande
require_once("./classes/Command.php");
// instanciation (on pourrait utiliser une classe statique)
$command = new Command();

// boucle infinie pour la saisie des commandes

while (true) {

    // lecture de l'entrée utilisateur
    $line = readline("Entrez votre commande : ");
    // echo "Vous avez saisi : $line\n";

    // liste (list)
    if ($line === "list") {
        $command->list();
    }
}

