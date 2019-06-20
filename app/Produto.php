<?php

namespace Mozika;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['PRO_NOME','PRO_VALOR'];
    protected $primaryKey = 'PRO_ID';
    protected $table='produtos';
}
