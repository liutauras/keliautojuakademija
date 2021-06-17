<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uzklausa extends Model
{
    protected $table = 'uzklausos';
    
    public $keliatoju_skaicius, $kiti_pageidavimai, $pageidaujamos_salys;
    
    use HasFactory;
    public $fillable = ['puslapis', 'vardas', 'tel', 'el_pastas', 'uzklausa'];
}
