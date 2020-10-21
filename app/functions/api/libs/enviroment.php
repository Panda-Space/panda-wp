<?php

function setEnviromentVariables($enviroment = []) {
    $enviroment = array_merge($enviroment, [
        'nonce' => wp_create_nonce( 'wp_rest' )
    ]);

    wp_localize_script( 'pandawp/script/main', 'panda', $enviroment);
}
