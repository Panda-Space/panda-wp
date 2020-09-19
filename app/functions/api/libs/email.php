<?php

function __getEmailTemplate($file, $data){
    ob_start(); require(__DIR__ . "/../emails/{$file}.php");

    return ob_get_clean();
}
