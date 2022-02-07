<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produtos_Estoque extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "produtos_estoque";
}
