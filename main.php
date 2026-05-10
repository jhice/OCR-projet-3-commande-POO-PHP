<?php

// classe commande
require_once("./classes/Command.php");
// instanciation (on pourrait utiliser une classe statique)
$command = new Command();

// boucle infinie pour la saisie des commandes

while (true) {

    // lecture de l'entrée utilisateur
    $line = readline("Entrez votre commande : ");

    // liste (list)
    if ($line === "list") {
        $command->list();
    }

    // détail contact (detail id)
    // 1. preg_match() permet de vérifier un motif de chaine (ici la chaine "detail " suivie d'un nombre)
    // 2. preg_match() permet d'extraire une chaine (résultats sous forme de tableau)
    else if (preg_match('/detail (\d+)/', $line, $matches)) {

        // print_r($matches);
        // Array
        // (
        //     [0] => detail 42
        //     [1] => 42
        // )

        // l'index 1 nous intéresse, sous forme d'entier (ici via le casting de type)
        $id = (int) $matches[1];
        // var_dump($id);

        // on appelle la fonction dans l'objet $command
        $command->detail($id);
    }

    // create [name], [email], [phone number] : crée un contact
    // name : lettres et tiret en nombre illimité (au moins 1)
    // email : pattern email
    // phone number : 8 chiffres exactement
    else if (preg_match('/create ([a-zA-Z- ]+), ([\w\-\.]+@([\w-]+\.)+[\w-]{2,}), (\d{8})/', $line, $matches)) {

        // print_r($matches);
        // Array
        // (
        //     [0] => create john rambo, rambo@cine.com, 12345678
        //     [1] => john rambo
        //     [2] => rambo@cine.com
        //     [3] => cine.
        //     [4] => 12345678
        // )

        // extraction des données sous forme de tableau pour envoi à la commande
        $data = [
            'name' => $matches[1],
            'email' => $matches[2],
            'phone_number' => $matches[4],
        ];

        $command->create($data);
    }

    // suppression contact (delete id)
    else if (preg_match('/delete (\d+)/', $line, $matches)) {

        // print_r($matches);
        // Array
        // (
        //     [0] => delete 42
        //     [1] => 42
        // )

        // l'index 1 nous intéresse, sous forme d'entier (ici via le casting de type)
        $id = (int) $matches[1];
        // var_dump($id);

        // on appelle la fonction dans l'objet $command
        $command->delete($id);
    }

    // aide
    else if ($line === "help") {

        // on affiche la liste des commandes
        echo "help : affiche cette aide
list : liste les contacts
create [name], [email], [phone number] : crée un contact
delete [id] : supprime un contact
quit : quitte le programme\n";

    }

    // quitter
    else if ($line === "quit") {
        // on affiche un message
        echo "Au revoir.\n";
        // on sort de la boucle while
        break;
    }

    // commande non trouvée
    else {
        echo "Commande non trouvée (tapez \"help\" pour voir la liste des commandes).\n";
    }
}
