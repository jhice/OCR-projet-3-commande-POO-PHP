<?php

/**
 * classe d'accès à la base de données
 */

require_once('./config.php');

class DBConnect
{
    /**
     * instance de PDO (Singleton)
     */
    private static ?PDO $client = null;

    /**
     * création du client de connexion à MySql
     */
    public static function getPDO()
    {
        try {
            // a-t-on besoin d'instancié la classe PDO ?
            if (static::$client === null) {
                // On se connecte à MySQL, on stocke la référence dans la propriété statique $client
                static::$client = new PDO(
                    // la configuration vient du fichier config.php
                    'mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8', DB_USER, DB_PASSWORD,
                    // gestion des erreurs
                    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
                );
            }
            // on aura toujours la même instance unique de PDO
            // var_dump(static::$client);
        } catch (Exception $e) {
            // En cas d'erreur, on affiche un message et on arrête tout
            die('Erreur : ' . $e->getMessage());
        }
        // on retourne l'instance du client PDO
        return static::$client;
    }
}
