<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */
    
    'failed'   => 'Ces identifiants ne correspondent pas à nos enregistrements',
    'throttle' => 'Tentatives de connexion trop nombreuses. Veuillez essayer de nouveau dans :seconds secondes.',

    /*
    |--------------------------------------------------------------------------
    | Custom Auth Implementation
    |--------------------------------------------------------------------------
    */

    'attributes' => [
        'roles' => [
            'tutor' => 'Tuteur',
            'student' => 'Étudiant',
        ],
        'role' => 'Rôle',
        'name' => 'Nom d’utilisateur',
        'email' => 'Courrier Électronique',
        'password' => 'Mot De Passe',
        'password_confirmation' => 'Confirmer Le Mot De Passe',
        'remember_me' => 'Souviens-toi De Moi',
        'allow_newsletters' => 'J’accepte De Recevoir Des Newsletters',
        'locale' => 'Langue',
        'timezone' => 'Fuseau Horaire',
    ],

    'login' => [
        'title' => 'Fala Education',
        'description' => 'Déjà Inscrit? Se Connecter!',
        'submit' => 'Se Connecter',
        'forgot_password_link' => 'Mot De Passe Oublié?',
        'register_link' => 'Vous N’avez Pas Encore De Compte?',
    ],

    'register' => [
        'title' => 'Créez Votre Compte',
        'description' => 'Obtenez Un Accès À Notre Communauté Aujourd’hui!',
        'submit' => 'Inscrivez-vous',
        'login_link' => 'Vous Avez Déjà Un Compte?',
    ],

    'verify' => [
        'title' => 'Vérifiez Votre Courrier Électronique',
        'description' => 'Avant De Continuer, Veuillez Vérifier Si Votre Adresse Électronique Contient Un Lien De Vérification.',
        'alert' => 'Un Nouveau Lien De Vérification A Été Envoyé À Votre Adresse Électronique.',
        'verification_link' => 'Vous N’avez Pas Reçu Le Courrier Électronique? Cliquez Ici Pour Le Renvoyer.',
    ],

    'passwords' => [

        'email' => [
            'title' => 'Rappel Du Mot De Passe',
            'description' => 'Veuillez Fournir L’email De Votre Compte Et Nous Vous Enverrons Votre Mot De Passe.',
            'submit' => 'Envoyer Le Lien De Réinitialisation Du Mot De Passe',
            'login_link' => 'Vous Avez Mémorisé Votre Compte? Se Connecter!',
        ],

        'reset' => [
            'title' => 'Réinitialiser Le Mot De Passe',
            'description' =>'Entrez Un Nouveau Mot De Passe Pour Votre Compte.',
            'submit' => 'Mettre À Jour Le Mot De Passe',
        ],

    ],

];