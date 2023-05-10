<?php

//!  Connection à la base de données

try {
    $db = new PDO('mysql:host=localhost;dbname=compagny', 'root', '');
    echo 'connected';
} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage();
    die();
}
