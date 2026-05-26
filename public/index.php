<?php
# public/index.php


/*
 * Front Controller de la gestion du livre d'or
 */

/*
 * Chargement des dépendances
 */
// chargement de configuration
require_once "../config.php";
// chargement du modèle de la table guestbook

require_once ROUTE_PROJECT . "/model/guestbookModel.php";

/*
 * Connexion à la base de données en utilisant PDO
 * Avec un try catch pour gérer les erreurs de connexion
 * Utilisez les constantes de config.php
 * Activez le mode d'erreur de PDO à Exception et
 * le mode fetch à tableau associatif
 */
try {
    $db = new PDO(
        dsn:      Maria_DSN,
        username: DB_NAME,
        password: DB_PWD,
        options: [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]
    );
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die($e->getMessage());
}
/*
 * Si le formulaire a été soumis
 */
if (isset(
    $_POST['firstname'],
    $_POST['lastname'],
    $_POST['usermail'],
    $_POST['phone'],
    $_POST['postcode'],
    $_POST['message']
)) {
    // on appelle la fonction d'insertion dans la DB (addGuestbook())
    $insert = addGuestbook(
        db:        $db,
        firstname: $_POST['firstname'],
        lastname:  $_POST['lastname'],
        usermail:  $_POST['usermail'],
        phone:     $_POST['phone'],
        postcode:  $_POST['postcode'],
        message:   $_POST['message']
    );
    // si l'insertion a réussi
        if ($insert === true) {
        // Succès : on stocke le message en session et on redirige (PRG pattern)
        $_SESSION['feedbackMessage'] = ['type' => 'success', 'text' => 'Votre message a bien été enregistré !'];
        header('Location: index.php');
        exit();
    } else {
        // Échec de validation backend
        $feedbackMessage = ['type' => 'error', 'text' => 'Erreur : vérifiez vos données et réessayez.'];
    }
}
// on appelle la fonction de récupération de la DB (getAllGuestbook())
$messages   = getAllGuestbook($db);
$nbMessages = count($messages);



// on redirige vers la page actuelle (ou on affiche un message de succès)

// sinon, on affiche un message d'erreur

/*
 * On récupère les messages du livre d'or
 */



/*********************
 * Ou Bonus Pagination
 *********************/

// on vérifie sur quelle page on est (et que c'est un string qui contient que des numériques sans "." ni "-" => ctype_digit) en utilisant la variable $_GET et les constantes de config.php

# on compte le nombre total de messages (SQL)

# on récupère la pagination

# pour obtenir le $offset pour les messages (calcul)

# on veut récupérer les messages de la page courante

/**************************
 * Fin du Bonus Pagination
 **************************/

// Appel de la vue

require ROUTE_PROJECT . "/view/guestbookView.php";

// fermeture de la connexion (bonne pratique)
$db = null;