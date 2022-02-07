<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produtos_Imagen extends Model
{
    use HasFactory;
    protected $table = "produtos_imagens";
    public $timestamps = false;
}
