<?php

$database::statement('CREATE TABLE IF NOT EXISTS wp_leads(
    id INT NOT NULL AUTO_INCREMENT,
    brand VARCHAR(70) NOT NULL,
    fullname VARCHAR(70) NOT NULL,
    email VARCHAR(70) NOT NULL,
    interest VARCHAR(70) NOT NULL,
    details TEXT NOT NULL,

    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    PRIMARY KEY (id)
)');
