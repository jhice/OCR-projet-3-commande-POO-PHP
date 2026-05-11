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
    } else if (preg_match('/detail (\d+)/', $line, $matches)) {
        // détail contact (detail id)
        // 1. preg_match() permet de vérifier un motif de chaine (ici la chaine "detail " suivie d'un nombre)
        // 2. preg_match() permet d'extraire une chaine (résultats sous forme de tableau)

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
    } else if (preg_match('/create ([a-zA-Z- ]+), ([\w\-\.]+@([\w-]+\.)+[\w-]{2,}), (\d{8})/', $line, $matches)) {
        // create [name], [email], [phone number] : crée un contact
        // name : lettres et tiret en nombre illimité (au moins 1)
        // email : pattern email
        // phone number : 8 chiffres exactement

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
    } else if (preg_match('/modify (\d+), ([a-zA-Z- ]+), ([\w\-\.]+@([\w-]+\.)+[\w-]{2,}), (\d{8})/', $line, $matches)) {
        // modify [id] [name], [email], [phone number] : crée un contact
        // name : lettres et tiret en nombre illimité (au moins 1)
        // email : pattern email
        // phone number : 8 chiffres exactement

        // print_r($matches);
        // Array
        // (
        //     [0] => update 12, john rambo, rambo@cine.com, 12345678
        //     [1] => 12
        //     [2] => john rambo
        //     [3] => rambo@cine.com
        //     [4] => cine.
        //     [5] => 12345678
        // )

        // on vérifie que le contact existe en base de données

        // extraction des données sous forme de tableau pour envoi à la commande
        $data = [
            'id' => $matches[1],
            'name' => $matches[2],
            'email' => $matches[3],
            'phone_number' => $matches[5],
        ];

        $command->modify($data);
    } else if (preg_match('/delete (\d+)/', $line, $matches)) {
        // suppression contact (delete id)

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
    } else if ($line === "help") {
        // aide

        // on affiche la liste des commandes (à voir : HEREDOC pour l'indentation)
        echo "help : affiche cette aide
list : liste les contacts
create [name], [email], [phone number] : crée un contact
modify [id], [name], [email], [phone number] : modifie un contact
delete [id] : supprime un contact
quit : quitte le programme\n";
    } else if ($line === "quit") {
        // quitter
        // on affiche un message
        echo "Au revoir.\n";
        // on sort de la boucle while
        break;
    } else {
        // commande non trouvée
        echo "Commande non trouvée (tapez \"help\" pour voir la liste des commandes).\n";
    }
}
