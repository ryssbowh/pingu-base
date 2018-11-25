<?php

return [
    'name' => 'Settings',

    /*
    |--------------------------------------------------------------------------
    | Keys to automagically encrypt and decrypt
    |--------------------------------------------------------------------------
    |
    | This option controls the settings that will automagically be encrypted
    | and decrypted by the Super Simple Laravel Settings package. Expects  
    | an object or array of setting 'keys' to be passed here. 
    |
    */
    'encrypt' => [],

    /*
    |
    | Register app settings to be database driven
    |
    */
    
    'register' => [
        'app.name' => [
            'title' => 'Site name',
            'section' => 'general'
        ],
        'session.lifetime' => [
            'title' => 'Session lifetime',
            'section' => 'Session'
        ]
    ]
];
