<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paperform extends Model
{
    use HasFactory;
    public $fillable = ['pavadinimas', 'url', 'paperform_code', 'puslapis', 'vardas', 'tel', 'el_pastas', 'uzklausa'];
}
