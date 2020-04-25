<?php

/**
 * SOURCE: https://github.com/GoogleCloudPlatform/php-docs-samples/blob/master/appengine/php72/front-controller/index.php
 * This is an example of a front controller for a flat file PHP site. Using a
 * Static list provides security against URL injection by default. See README.md
 * for more examples.
 */
# [START gae_simple_front_controller]
switch (@parse_url($_SERVER['REQUEST_URI'])['path']) {
    case '/':
        require 'home.php';
        break;
    case '/connectdb.php':
        require 'connectdb.php';
        break;
    case '/createPokemon.php':
        require 'createPokemon.php';
        break;
    case '/createTeam.php':
        require 'createTeam.php';
        break;   
    case '/customPokemon.php':
        require 'customPokemon.php';
        break; 
    case '/home.php':
        require 'home.php';
        break;
    case '/index.php':
        require 'index.php';
        break;
    case '/myCustom.php':
        require 'myCustom.php';
        break;
    case '/myTeams.php':
        require 'myTeams.php';
        break;
    case '/profile.php':
        require 'profile.php';
        break;
    case '/register.php':
        require 'register.php';
        break;
    case '/teams.php':
        require 'teams.php';
        break;
    case '/logout.php':
        require 'logout.php';
        break;
    case '/signin.php':
        require 'signin.php';
        break;
    default:
        http_response_code(404);
        exit('Not Found');
}
?>