<?php
# doit être enregistré sous le nom config.php
// paramètres de connexions
const DB_CONNECT_TYPE    = "mysql";
const DB_CONNECT_HOST    = "localhost";
const DB_CONNECT_PORT    = 3307; // pour MariaDB, ou le port par défaut de MySQL : 3306
const DB_CONNECT_NAME    = "ti2web2026";
const DB_CONNECT_CHARSET = "utf8mb4";
const DB_CONNECT_USER    = "root";
const DB_CONNECT_PWD     = "";

#DSN raccourci pour la connexion
const MARIA_DSN = DB_CONNECT_TYPE . ":host=" . DB_CONNECT_HOST
                . ";dbname=" . DB_CONNECT_NAME
                . ";port=" . DB_CONNECT_PORT
                . ";charset=" . DB_CONNECT_CHARSET . ";";


# URL absolue du projet
const ROUTE_PROJECT = __DIR__;

# pour la pagination (BONUS)
const PAGINATION_NB = 3; // nombre d'éléments par page
const PAGINATION_GET = "pg"; // nom de la variable GET pour la pagination