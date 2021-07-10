<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model {
    protected $table    = 'wp_leads';
    protected $fillable = [
        'brand',
        'fullname',
        'email',
        'interest',
        'details'
    ];
}
