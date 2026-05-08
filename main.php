<?php

// boucle infinie pour la saisie des commandes

while (true) {

    // lecture de l'entrée utilisateur
    $line = readline("Entrez votre commande : ");
    // echo "Vous avez saisi : $line\n";

    // liste (list)
    if ($line === "list") {
        echo "affichage de la liste des contacts\n";
    }
}

