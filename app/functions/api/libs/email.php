<?php

function __getEmailTemplate($file, $data = null){
    ob_start(); require(__DIR__ . "/../emails/{$file}.php");

    return ob_get_clean();
}
