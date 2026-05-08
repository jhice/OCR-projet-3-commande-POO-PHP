<?php

/**
 * classe d'accès à la base de données
 */

class DBConnect
{
    /**
     * création du client de connexion à MySql
     */
    public static function getPDO()
    {
        try {
            // On se connecte à MySQL
            $client = new PDO(
                'mysql:host=localhost;dbname=contact;charset=utf8',
                'contact',
                'contact',
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
            );
        } catch (Exception $e) {
            // En cas d'erreur, on affiche un message et on arrête tout
            die('Erreur : ' . $e->getMessage());
        }

        return $client;
    }
}